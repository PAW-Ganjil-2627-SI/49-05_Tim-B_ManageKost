<?php

namespace Tests\Feature;

use App\Models\PenghuniKost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PenghuniKostTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->get(route('penghuni.index'))->assertRedirect(route('login'));
        $this->get(route('kamar.index'))->assertRedirect(route('login'));
        $this->get(route('housekeeper.index'))->assertRedirect(route('login'));
        $this->get(route('inventaris.index'))->assertRedirect(route('login'));
    }

    public function test_placeholder_pages_remain_unfilled_for_authenticated_users(): void
    {
        $operator = User::factory()->operator()->create();

        $this->actingAs($operator)->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSee('Konten Dashboard belum diisi.');

        $this->actingAs($operator)->get(route('kamar.index'))
            ->assertStatus(200)
            ->assertSee('Halaman Master Kamar belum diisi.');

        $this->actingAs($operator)->get(route('housekeeper.index'))
            ->assertStatus(200)
            ->assertSee('Halaman Housekeeper / Staff belum diisi.');

        $this->actingAs($operator)->get(route('inventaris.index'))
            ->assertStatus(200)
            ->assertSee('Halaman Inventaris Aset Kos belum diisi.');
    }

    public function test_can_display_penghuni_index_page(): void
    {
        PenghuniKost::factory()->create([
            'nama' => 'Budi Santoso',
            'status' => 'Lunas',
        ]);

        $response = $this->actingAs($this->admin)->get(route('penghuni.index'));

        $response->assertStatus(200);
        $response->assertSee('Budi Santoso');
        $response->assertSee('Lunas');
    }

    public function test_can_filter_penghuni_by_name(): void
    {
        PenghuniKost::factory()->create(['nama' => 'Siti Aminah']);
        PenghuniKost::factory()->create(['nama' => 'Rudi Hartono']);

        $response = $this->actingAs($this->admin)->get(route('penghuni.index', ['cari' => 'Siti']));

        $response->assertStatus(200);
        $response->assertSee('Siti Aminah');
        $response->assertDontSee('Rudi Hartono');
    }

    public function test_can_display_create_form(): void
    {
        $response = $this->actingAs($this->admin)->get(route('penghuni.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Penghuni Baru');
    }

    public function test_can_store_new_penghuni(): void
    {
        $data = [
            'nama' => 'Dewi Sartika',
            'nik' => '3201123456780009',
            'jk' => 'Perempuan',
            'telepon' => '081299887766',
            'pekerjaan' => 'Mahasiswi UI',
            'kamar' => 'Kamar A-01 (Griya Harmoni)',
            'tgl_masuk' => '2026-10-01',
            'harga' => '1200000',
            'kontak_darurat' => 'Bapak Sartika (081233445566)',
            'status' => 'Lunas',
        ];

        $response = $this->actingAs($this->admin)->post(route('penghuni.store'), $data);

        $response->assertRedirect(route('penghuni.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('penghuni_kost', [
            'nama' => 'Dewi Sartika',
            'nik' => '3201123456780009',
        ]);
    }

    public function test_can_display_edit_form(): void
    {
        $penghuni = PenghuniKost::factory()->create([
            'nama' => 'Joko Widodo',
        ]);

        $response = $this->actingAs($this->admin)->get(route('penghuni.edit', $penghuni));

        $response->assertStatus(200);
        $response->assertSee('Joko Widodo');
    }

    public function test_can_update_penghuni(): void
    {
        $penghuni = PenghuniKost::factory()->create([
            'nama' => 'Nama Lama',
            'status' => 'Belum lunas',
        ]);

        $updateData = [
            'nama' => 'Nama Baru',
            'nik' => $penghuni->nik,
            'jk' => $penghuni->jk,
            'telepon' => $penghuni->telepon,
            'pekerjaan' => 'Pekerjaan Baru',
            'kamar' => $penghuni->kamar,
            'tgl_masuk' => '2026-10-15',
            'harga' => '1500000',
            'kontak_darurat' => $penghuni->kontak_darurat,
            'status' => 'Lunas',
        ];

        $response = $this->actingAs($this->admin)->put(route('penghuni.update', $penghuni), $updateData);

        $response->assertRedirect(route('penghuni.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('penghuni_kost', [
            'id' => $penghuni->id,
            'nama' => 'Nama Baru',
            'harga' => '1500000',
            'status' => 'Lunas',
        ]);
    }

    public function test_admin_can_delete_penghuni(): void
    {
        $penghuni = PenghuniKost::factory()->create([
            'nama' => 'Penghuni Mau Dihapus',
        ]);

        $response = $this->actingAs($this->admin)->delete(route('penghuni.destroy', $penghuni));

        $response->assertRedirect(route('penghuni.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('penghuni_kost', [
            'id' => $penghuni->id,
        ]);
    }

    public function test_operator_can_manage_penghuni_but_cannot_delete(): void
    {
        $operator = User::factory()->operator()->create();
        $penghuni = PenghuniKost::factory()->create([
            'nama' => 'Penghuni Awal',
            'status' => 'Lunas',
        ]);

        $indexResponse = $this->actingAs($operator)->get(route('penghuni.index'));
        $indexResponse->assertStatus(200);
        $indexResponse->assertDontSee('title="Hapus Data"', false);

        $this->actingAs($operator)
            ->get(route('penghuni.edit', $penghuni))
            ->assertStatus(200);

        $this->actingAs($operator)
            ->put(route('penghuni.update', $penghuni), [
                'nama' => 'Penghuni Diubah Operator',
                'nik' => $penghuni->nik,
                'jk' => $penghuni->jk,
                'telepon' => $penghuni->telepon,
                'pekerjaan' => $penghuni->pekerjaan,
                'kamar' => $penghuni->kamar,
                'tgl_masuk' => '2026-10-15',
                'harga' => '1350000',
                'kontak_darurat' => $penghuni->kontak_darurat,
                'status' => 'Lunas',
            ])
            ->assertRedirect(route('penghuni.index'));

        $this->assertDatabaseHas('penghuni_kost', [
            'id' => $penghuni->id,
            'nama' => 'Penghuni Diubah Operator',
            'harga' => '1350000',
        ]);

        $this->actingAs($operator)
            ->delete(route('penghuni.destroy', $penghuni))
            ->assertStatus(403);

        $this->assertDatabaseHas('penghuni_kost', [
            'id' => $penghuni->id,
        ]);
    }

    public function test_role_middleware_rejects_unauthorized_role_with_custom_403(): void
    {
        $unauthorized = User::factory()->create(['role' => 'tamu']);

        $response = $this->actingAs($unauthorized)->get(route('penghuni.index'));

        $response->assertStatus(403);
        $response->assertSee('Akses Ditolak');
        $response->assertSee('Anda tidak memiliki hak akses untuk peran ini.');
    }

    public function test_role_middleware_matches_roles_case_insensitively(): void
    {
        $operator = User::factory()->create(['role' => 'Operator']);

        $this->actingAs($operator)
            ->get(route('penghuni.index'))
            ->assertStatus(200);
    }
}
