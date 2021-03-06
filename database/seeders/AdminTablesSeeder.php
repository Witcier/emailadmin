<?php

namespace Database\Seeders;

use Dcat\Admin\Models;
use Illuminate\Database\Seeder;
use DB;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        Models\Menu::truncate();
        Models\Menu::insert(
            [
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "feather icon-settings",
                    "id" => 2,
                    "order" => 5,
                    "parent_id" => 0,
                    "show" => 1,
                    "title" => "Admin",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "",
                    "id" => 3,
                    "order" => 6,
                    "parent_id" => 2,
                    "show" => 1,
                    "title" => "Users",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => "auth/users"
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "",
                    "id" => 4,
                    "order" => 7,
                    "parent_id" => 2,
                    "show" => 1,
                    "title" => "Roles",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => "auth/roles"
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "",
                    "id" => 5,
                    "order" => 8,
                    "parent_id" => 2,
                    "show" => 1,
                    "title" => "Permission",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => "auth/permissions"
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "",
                    "id" => 6,
                    "order" => 9,
                    "parent_id" => 2,
                    "show" => 1,
                    "title" => "Menu",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => "auth/menu"
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "extension" => "",
                    "icon" => "",
                    "id" => 7,
                    "order" => 10,
                    "parent_id" => 2,
                    "show" => 1,
                    "title" => "Extensions",
                    "updated_at" => "2021-07-19 03:07:21",
                    "uri" => "auth/extensions"
                ],
                [
                    "created_at" => "2021-07-19 02:22:03",
                    "extension" => "celaraze.dcat-extension-plus",
                    "icon" => "feather icon-settings",
                    "id" => 8,
                    "order" => 3,
                    "parent_id" => 0,
                    "show" => 1,
                    "title" => "Dcat Plus",
                    "updated_at" => "2021-07-19 03:06:43",
                    "uri" => "dcat-plus/site"
                ],
                [
                    "created_at" => "2021-07-19 02:25:27",
                    "extension" => "",
                    "icon" => NULL,
                    "id" => 9,
                    "order" => 2,
                    "parent_id" => 0,
                    "show" => 1,
                    "title" => "????????????",
                    "updated_at" => "2021-07-19 02:25:36",
                    "uri" => "works"
                ]
            ]
        );

        Models\Permission::truncate();
        Models\Permission::insert(
            [
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "",
                    "id" => 1,
                    "name" => "Auth management",
                    "order" => 1,
                    "parent_id" => 0,
                    "slug" => "auth-management",
                    "updated_at" => NULL
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "/auth/users*",
                    "id" => 2,
                    "name" => "Users",
                    "order" => 2,
                    "parent_id" => 1,
                    "slug" => "users",
                    "updated_at" => NULL
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "/auth/roles*",
                    "id" => 3,
                    "name" => "Roles",
                    "order" => 3,
                    "parent_id" => 1,
                    "slug" => "roles",
                    "updated_at" => NULL
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "/auth/permissions*",
                    "id" => 4,
                    "name" => "Permissions",
                    "order" => 4,
                    "parent_id" => 1,
                    "slug" => "permissions",
                    "updated_at" => NULL
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "/auth/menu*",
                    "id" => 5,
                    "name" => "Menu",
                    "order" => 5,
                    "parent_id" => 1,
                    "slug" => "menu",
                    "updated_at" => NULL
                ],
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "http_method" => "",
                    "http_path" => "/auth/extensions*",
                    "id" => 6,
                    "name" => "Extension",
                    "order" => 6,
                    "parent_id" => 1,
                    "slug" => "extension",
                    "updated_at" => NULL
                ]
            ]
        );

        Models\Role::truncate();
        Models\Role::insert(
            [
                [
                    "created_at" => "2021-07-19 02:20:59",
                    "id" => 1,
                    "name" => "Administrator",
                    "slug" => "administrator",
                    "updated_at" => "2021-07-19 02:21:04"
                ]
            ]
        );

        Models\Setting::truncate();
		Models\Setting::insert(
			[
                [
                    "created_at" => "2021-07-19 02:22:40",
                    "slug" => "footer_remove",
                    "updated_at" => "2021-07-19 02:22:40",
                    "value" => "0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:40",
                    "slug" => "grid_row_actions_right",
                    "updated_at" => "2021-07-19 02:22:40",
                    "value" => "0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:40",
                    "slug" => "sidebar_style",
                    "updated_at" => "2021-07-19 02:22:40",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:33",
                    "slug" => "site_debug",
                    "updated_at" => "2021-07-19 02:22:33",
                    "value" => "0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:34",
                    "slug" => "site_lang",
                    "updated_at" => "2021-07-19 02:22:34",
                    "value" => "zh_CN"
                ],
                [
                    "created_at" => "2021-07-19 02:22:33",
                    "slug" => "site_logo",
                    "updated_at" => "2021-07-19 02:22:33",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:33",
                    "slug" => "site_logo_mini",
                    "updated_at" => "2021-07-19 02:22:33",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:32",
                    "slug" => "site_logo_text",
                    "updated_at" => "2021-07-19 02:22:32",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:32",
                    "slug" => "site_title",
                    "updated_at" => "2021-07-19 02:22:32",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:32",
                    "slug" => "site_url",
                    "updated_at" => "2021-07-19 02:22:32",
                    "value" => ""
                ],
                [
                    "created_at" => "2021-07-19 02:22:40",
                    "slug" => "theme_color",
                    "updated_at" => "2021-07-19 02:22:55",
                    "value" => "default"
                ]
            ]
		);

		Models\Extension::truncate();
		Models\Extension::insert(
			[
                [
                    "created_at" => "2021-07-19 02:22:03",
                    "id" => 1,
                    "is_enabled" => 1,
                    "name" => "celaraze.dcat-extension-plus",
                    "options" => NULL,
                    "updated_at" => "2021-07-19 09:51:42",
                    "version" => "1.1.1"
                ],
                [
                    "created_at" => "2021-07-19 02:22:14",
                    "id" => 2,
                    "is_enabled" => 1,
                    "name" => "lake.login-captcha",
                    "options" => NULL,
                    "updated_at" => "2021-07-19 09:51:43",
                    "version" => "1.0.8"
                ]
            ]
		);

		Models\ExtensionHistory::truncate();
		Models\ExtensionHistory::insert(
			[
                [
                    "created_at" => "2021-07-19 02:22:03",
                    "detail" => "??????????????????",
                    "id" => 1,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:03",
                    "version" => "1.0.0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:04",
                    "detail" => "???????????????????????? & ???????????????????????????",
                    "id" => 2,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:04",
                    "version" => "1.0.1"
                ],
                [
                    "created_at" => "2021-07-19 02:22:04",
                    "detail" => "?????????????????? selectCreate ??? select ??????????????????????????????????????????",
                    "id" => 3,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:04",
                    "version" => "1.0.2"
                ],
                [
                    "created_at" => "2021-07-19 02:22:04",
                    "detail" => "??????????????????????????????",
                    "id" => 4,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:04",
                    "version" => "1.0.3"
                ],
                [
                    "created_at" => "2021-07-19 02:22:05",
                    "detail" => "??????????????????????????????????????????XSS?????????",
                    "id" => 5,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:05",
                    "version" => "1.0.4"
                ],
                [
                    "created_at" => "2021-07-19 02:22:05",
                    "detail" => "???????????????????????????????????????????????????????????????",
                    "id" => 6,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:05",
                    "version" => "1.0.5"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "selectCreate?????????????????????????????????",
                    "id" => 7,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.6"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "UI?????????????????????????????????????????????",
                    "id" => 8,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.6"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "??????DcatAdmin 2.0.18beta???",
                    "id" => 9,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.7"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "?????????????????????????????????????????????????????????",
                    "id" => 10,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.7"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "???????????????????????????",
                    "id" => 11,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.7"
                ],
                [
                    "created_at" => "2021-07-19 02:22:07",
                    "detail" => "?????????????????????????????????????????????",
                    "id" => 12,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:07",
                    "version" => "1.0.7"
                ],
                [
                    "created_at" => "2021-07-19 02:22:08",
                    "detail" => "???????????????????????????????????????",
                    "id" => 13,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:08",
                    "version" => "1.0.8"
                ],
                [
                    "created_at" => "2021-07-19 02:22:08",
                    "detail" => "??????HTML???JS??????",
                    "id" => 14,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:08",
                    "version" => "1.0.9"
                ],
                [
                    "created_at" => "2021-07-19 02:22:09",
                    "detail" => "????????????UI??????",
                    "id" => 15,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:09",
                    "version" => "1.0.9"
                ],
                [
                    "created_at" => "2021-07-19 02:22:09",
                    "detail" => "??????debug?????????????????????",
                    "id" => 16,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:09",
                    "version" => "1.1.0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:09",
                    "detail" => "????????????????????????",
                    "id" => 17,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:09",
                    "version" => "1.1.0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:09",
                    "detail" => "??????????????????????????????",
                    "id" => 18,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:09",
                    "version" => "1.1.0"
                ],
                [
                    "created_at" => "2021-07-19 02:22:09",
                    "detail" => "?????????????????????????????????",
                    "id" => 19,
                    "name" => "celaraze.dcat-extension-plus",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:09",
                    "version" => "1.1.1"
                ],
                [
                    "created_at" => "2021-07-19 02:22:14",
                    "detail" => "????????????????????????????????????dcat?????????????????????????????????",
                    "id" => 20,
                    "name" => "lake.login-captcha",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:14",
                    "version" => "1.0.6"
                ],
                [
                    "created_at" => "2021-07-19 02:22:14",
                    "detail" => "??????????????????????????????",
                    "id" => 21,
                    "name" => "lake.login-captcha",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:14",
                    "version" => "1.0.7"
                ],
                [
                    "created_at" => "2021-07-19 02:22:15",
                    "detail" => "??????????????????????????????????????????",
                    "id" => 22,
                    "name" => "lake.login-captcha",
                    "type" => 1,
                    "updated_at" => "2021-07-19 02:22:15",
                    "version" => "1.0.8"
                ]
            ]
		);

        // pivot tables
        DB::table('admin_permission_menu')->truncate();
		DB::table('admin_permission_menu')->insert(
			[

            ]
		);

        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [

            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [

            ]
        );

        // finish
    }
}
