<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use Spatie\LaravelSettings\Migrations\SettingsBlueprint;

class OrganisationSettings extends SettingsMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->migrator->inGroup('organisation', function (SettingsBlueprint $blueprint): void {
            $blueprint->add('company_name', null);
            $blueprint->add('company_acronym', null);
            $blueprint->add('company_logo', null);
            $blueprint->add('company_email', null);
            $blueprint->add('company_address', null);            
            $blueprint->add('company_telephone', null);            
            $blueprint->add('company_website', null);            
            $blueprint->add('company_country', null);            

        });
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
