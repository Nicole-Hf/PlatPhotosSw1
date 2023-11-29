<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Organizador']);
        $role3 = Role::create(['name' => 'Fotografo']);
        $role4 = Role::create(['name' => 'Invitado']);

        //Permisos para el Admin
        //crud roles
        Permission::firstOrCreate(['name' => 'ver-rol'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'crear-rol'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'editar-rol'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'borrar-rol'])->assignRole($role1);
        //crud users
        Permission::firstOrCreate(['name' => 'ver-user'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'crear-user'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'editar-user'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'borrar-user'])->assignRole($role1);

        Permission::firstOrCreate(['name' => 'borrar-evento'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'borrar-catalogo'])->syncRoles([$role1]);

        //Permisos para el organizador
        //Eventos
        Permission::firstOrCreate(['name' => 'ver-evento'])->syncRoles([$role1,$role2]);
        Permission::firstOrCreate(['name' => 'crear-evento'])->syncRoles([$role2]);
        Permission::firstOrCreate(['name' => 'editar-evento'])->syncRoles([$role1,$role2]);
        //invitaciones
        Permission::firstOrCreate(['name' => 'contratar-fotografo'])->syncRoles([$role2]);

        //Permisos para el fotografo
        //Catalogo
        Permission::firstOrCreate(['name' => 'crear-catalogo'])->syncRoles([$role3]);
        Permission::firstOrCreate(['name' => 'editar-catalogo'])->syncRoles([$role1,$role3]);
        //Muestrario
        Permission::firstOrCreate(['name' => 'ver-muestrario'])->syncRoles([$role3, $role2]);
        Permission::firstOrCreate(['name' => 'subir-fotos'])->syncRoles([$role3]);
        Permission::firstOrCreate(['name' => 'borrar-foto'])->syncRoles([$role1, $role3]);


        //Permisos para el participante
        Permission::firstOrCreate(['name' => 'ver-compra'])->syncRoles([$role1,$role4]);
        Permission::firstOrCreate(['name' => 'crear-compra'])->syncRoles([$role4]);
        Permission::firstOrCreate(['name' => 'editar-compra'])->syncRoles([$role4]);
        Permission::firstOrCreate(['name' => 'borrar-compra'])->syncRoles([$role1]);

        Permission::firstOrCreate(['name' => 'subir-perfil'])->syncRoles([$role1,$role4]);

        //Todos los usuarios
        Permission::firstOrCreate(['name' => 'show-evento'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::firstOrCreate(['name' => 'ver-catalogo'])->syncRoles([$role1,$role2,$role3,$role4]);

    }
}
