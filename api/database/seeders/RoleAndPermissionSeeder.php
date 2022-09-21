<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      
//         // Reset cached roles and permissions
//         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
//         //UTILISATEURS
        
//         $addUser='ajouter utilisateurs';
//         $editUser='modifier utilisateurs';
//         $deleteUser='supprimer utilisateurs';
//         $approveUser='approuver utilisateurs';
//         $signalUser='signaler utilisateurs';
//         $unsignalUser='disculper utilisateurs';
//         $suspendUser='suspendre utilisateurs';
//         $blockUser='bloquer utilisateurs';
//         //PUBLICATIONS

//         $addPosts="ajouter publications";       
//         $editPosts=" modifier publications";       
//         $deletePosts="supprimer publications";       
//         $publishPosts="publier publications";       
//         $unpublishPosts="depublish publications";       
//         $signalPosts="signaler publications";       
//         $unsignalPosts="disculper publications";

//         $addCategory="Ajouter categories";
//         $editCategory="modifier categories";
//         $supprimerCategory="supprimer categories";


//         //COMMENTAIRES
//         $addComments="ajouter Commentaires";       
//         $editComments=" modifier Commentaires";       
//         $deleteComments="supprimer Commentaires";       
//         $publishComments="publier Commentaires";       
//         $unpublishComments="depublish Commentaires";       
//         $signalComments="signaler Commentaires";       
//         $unsignalComments="disculper commentaires";


//         //ROLES AVALAIBLE

//         $superAdmin='super-admin';
//         $systemAdmin='system-admin';
//         $simple_user='utilisateur simple';
//         $moderator='moderateur';
// //------------------------------------------------------------------------------------

//         // create permissions publications
//         Permission::create(['name' => $addPosts]);
//         Permission::create(['name' => $editPosts]);
//         Permission::create(['name' => $deletePosts]);
//         Permission::create(['name' => $publishPosts]);
//         Permission::create(['name' => $unpublishPosts]);
//         Permission::create(['name' => $signalPosts]);
//         Permission::create(['name' => $unsignalPosts]);

//         // create permissions comments

//         Permission::create(['name' => $addComments]);
//         Permission::create(['name' => $editComments]);
//         Permission::create(['name' => $deleteComments]);
//         Permission::create(['name' => $publishComments]);
//         Permission::create(['name' => $unpublishComments]);
//         Permission::create(['name' => $signalComments]);
//         Permission::create(['name' => $unsignalComments]);

//         // create roles and assign created permissions

//         // this can be done as separate statements
//         $role = Role::create(['name' =>$simple_user]);
//         $role->givePermissionTo(
//             $addPosts,
//             $editPosts,
//             $deletePosts,
//             $publishPosts,
//             $addComments,
//         );

//         // or may be done by chaining
//         $role = Role::create(['name' =>$moderator])
//             ->givePermissionTo([
//             $publishPosts,
//             $unpublishPosts,
//             $signalPosts,
//             $unsignalPosts,
//             $publishComments,
//             $unpublishComments,
//             $signalComments,
//             $unsignalComments
//             ]);

//         $role = Role::create(['name' => $systemAdmin])
//             ->givePermissionTo([
//             $addUser,
//             $editUser,
//             $deleteUser,
//             $approveUser,
//             $signalUser,
//             $unsignalUser,
//             $suspendUser,
//             $blockUser]);

//         // $role = Role::create(['name' => $superAdmin]);
//         // $role->givePermissionTo(Permission::all());


    }
    
}
