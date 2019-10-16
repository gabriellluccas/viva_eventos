<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert(['nome' => 'Acre', 'codigo' => 'AC']);
        DB::table('cidades')->insert(['nome' => 'Alagoas', 'codigo' => 'AL']);
        DB::table('cidades')->insert(['nome' => 'Amapá', 'codigo' => 'AP']);
        DB::table('cidades')->insert(['nome' => 'Amazonas', 'codigo' => 'AM']);
        DB::table('cidades')->insert(['nome' => 'Bahia', 'codigo' => 'BA']);
        DB::table('cidades')->insert(['nome' => 'Ceará', 'codigo' => 'CE']);
        DB::table('cidades')->insert(['nome' => 'Distrito Federal', 'codigo' => 'DF']);
        DB::table('cidades')->insert(['nome' => 'Espírito Santo', 'codigo' => 'ES']);
        DB::table('cidades')->insert(['nome' => 'Goiás', 'codigo' => 'GO']);
        DB::table('cidades')->insert(['nome' => 'Maranhão', 'codigo' => 'MA']);
        DB::table('cidades')->insert(['nome' => 'Mato Grosso', 'codigo' => 'MT']);
        DB::table('cidades')->insert(['nome' => 'Mato Grosso do Sul', 'codigo' => 'MS']);
        DB::table('cidades')->insert(['nome' => 'Minas Gerais', 'codigo' => 'MG']);
        DB::table('cidades')->insert(['nome' => 'Pará', 'codigo' => 'PA']);
        DB::table('cidades')->insert(['nome' => 'Paraíba', 'codigo' => 'PB']);
        DB::table('cidades')->insert(['nome' => 'Paraná', 'codigo' => 'PR']);
        DB::table('cidades')->insert(['nome' => 'Pernambuco', 'codigo' => 'PE']);
        DB::table('cidades')->insert(['nome' => 'Piauí', 'codigo' => 'PI']);
        DB::table('cidades')->insert(['nome' => 'Rio de Janeiro', 'codigo' => 'RJ']);
        DB::table('cidades')->insert(['nome' => 'Rio Grande do Norte', 'codigo' => 'RN']);
        DB::table('cidades')->insert(['nome' => 'Rio Grande do Sul', 'codigo' => 'RS']);
        DB::table('cidades')->insert(['nome' => 'Rondônia', 'codigo' => 'RO']);
        DB::table('cidades')->insert(['nome' => 'Roraima', 'codigo' => 'RR']);
        DB::table('cidades')->insert(['nome' => 'Santa Catarina', 'codigo' => 'SC']);
        DB::table('cidades')->insert(['nome' => 'São Paulo', 'codigo' => 'SP']);
        DB::table('cidades')->insert(['nome' => 'Sergipe', 'codigo' => 'SE']);
        DB::table('cidades')->insert(['nome' => 'Tocantins', 'codigo' => 'TO']);

    }
}
