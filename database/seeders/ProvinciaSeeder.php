<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;
use App\Models\Canton;


class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create( [
    		'id'=>1,
    		'nombre'=>'AZUAY',
    		
    	] );



    	Provincia::create( [
    		'id'=>2,
    		'nombre'=>'BOLIVAR',
    		
    	] );



    	Provincia::create( [
    		'id'=>3,
    		'nombre'=>'CAÑAR',
    		
    	] );



    	Provincia::create( [
    		'id'=>4,
    		'nombre'=>'CARCHI',
    		
    	] );



    	Provincia::create( [
    		'id'=>5,
    		'nombre'=>'COTOPAXI',
    		
    	] );



    	Provincia::create( [
    		'id'=>6,
    		'nombre'=>'CHIMBORAZO',
    		
    	] );



    	Provincia::create( [
    		'id'=>7,
    		'nombre'=>'EL ORO',
    		
    	] );



    	Provincia::create( [
    		'id'=>8,
    		'nombre'=>'ESMERALDAS',
    		
    	] );



    	Provincia::create( [
    		'id'=>9,
    		'nombre'=>'GUAYAS',
    		
    	] );



    	Provincia::create( [
    		'id'=>10,
    		'nombre'=>'IMBABURA',
    		
    	] );



    	Provincia::create( [
    		'id'=>11,
    		'nombre'=>'LOJA',
    		
    	] );



    	Provincia::create( [
    		'id'=>12,
    		'nombre'=>'LOS RIOS',
    		
    	] );



    	Provincia::create( [
    		'id'=>13,
    		'nombre'=>'MANABI',
    		
    	] );



    	Provincia::create( [
    		'id'=>14,
    		'nombre'=>'MORONA SANTIAGO',
    		   	] );



    	Provincia::create( [
    		'id'=>15,
    		'nombre'=>'NAPO',
    		
    	] );



    	Provincia::create( [
    		'id'=>16,
    		'nombre'=>'PASTAZA',
    		
    	] );



    	Provincia::create( [
    		'id'=>17,
    		'nombre'=>'PICHINCHA',
    		
    	] );



    	Provincia::create( [
    		'id'=>18,
    		'nombre'=>'TUNGURAHUA',
    		
    	] );



    	Provincia::create( [
    		'id'=>19,
    		'nombre'=>'ZAMORA CHINCHIPE',
    		
    	] );



    	Provincia::create( [
    		'id'=>20,
    		'nombre'=>'GALAPAGOS',
    		
    	] );



    	Provincia::create( [
    		'id'=>21,
    		'nombre'=>'SUCUMBIOS',
    		
    	] );



    	Provincia::create( [
    		'id'=>22,
    		'nombre'=>'ORELLANA',
    		
    	] );



    	Provincia::create( [
    		'id'=>23,
    		'nombre'=>'SANTO DOMINGO DE LOS TSACHILAS',
    		
    	] );



    	Provincia::create( [
    		'id'=>24,
    		'nombre'=>'SANTA ELENA',
    		
    	] );



    	Provincia::create( [
    		'id'=>25,
    		'nombre'=>'ZONAS NO DELIMITADAS',
    		
    	] );


    	Canton::create( [
    		'id'=>1,
    		'canton'=>'CUENCA',
    		'cod_cant'=>'0101',
    		'cod_postal'=>'010150',
    		'latitud'=>'-2.89601',
    		'longitud'=>'-79.00517',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>2,
    		'canton'=>'GIRÓN',
    		'cod_cant'=>'0102',
    		'cod_postal'=>'010250',
    		'latitud'=>'-3.15899',
    		'longitud'=>'-79.1478',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>3,
    		'canton'=>'GUALACEO',
    		'cod_cant'=>'0103',
    		'cod_postal'=>'010350',
    		'latitud'=>'-2.92194',
    		'longitud'=>'-78.77284',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>4,
    		'canton'=>'NABÓN',
    		'cod_cant'=>'0104',
    		'cod_postal'=>'010450',
    		'latitud'=>'-3.33592',
    		'longitud'=>'-79.0638',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>5,
    		'canton'=>'PAUTE',
    		'cod_cant'=>'0105',
    		'cod_postal'=>'010550',
    		'latitud'=>'-2.77997',
    		'longitud'=>'-78.76119',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>6,
    		'canton'=>'PUCARA',
    		'cod_cant'=>'0106',
    		'cod_postal'=>'010650',
    		'latitud'=>'-3.23333',
    		'longitud'=>'-79.46667',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>7,
    		'canton'=>'SAN FERNANDO',
    		'cod_cant'=>'0107',
    		'cod_postal'=>'010750',
    		'latitud'=>'-3.14723',
    		'longitud'=>'-79.25466',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>8,
    		'canton'=>'SANTA ISABEL',
    		'cod_cant'=>'0108',
    		'cod_postal'=>'010850',
    		'latitud'=>'-3.27578',
    		'longitud'=>'-79.31474',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>9,
    		'canton'=>'SIGSIG',
    		'cod_cant'=>'0109',
    		'cod_postal'=>'010950',
    		'latitud'=>'-3.09066',
    		'longitud'=>'-78.80524',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>10,
    		'canton'=>'OÑA',
    		'cod_cant'=>'0110',
    		'cod_postal'=>'011050',
    		'latitud'=>'-2.86667',
    		'longitud'=>'-78.78333',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>11,
    		'canton'=>'CHORDELEG',
    		'cod_cant'=>'0111',
    		'cod_postal'=>'011150',
    		'latitud'=>'-2.92175',
    		'longitud'=>'-78.77473',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>12,
    		'canton'=>'EL PAN',
    		'cod_cant'=>'0112',
    		'cod_postal'=>'011250',
    		'latitud'=>'-2.88708',
    		'longitud'=>'-78.9778',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>13,
    		'canton'=>'SEVILLA DE ORO',
    		'cod_cant'=>'0113',
    		'cod_postal'=>'011350',
    		'latitud'=>'-2.90085',
    		'longitud'=>'-79.01356',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>14,
    		'canton'=>'GUACHAPALA',
    		'cod_cant'=>'0114',
    		'cod_postal'=>'011450',
    		'latitud'=>'-2.77034',
    		'longitud'=>'-78.71198',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>15,
    		'canton'=>'CAMILO PONCE ENRÍQUEZ',
    		'cod_cant'=>'0115',
    		'cod_postal'=>'011550',
    		'latitud'=>'-3.0599',
    		'longitud'=>'-79.74647',
    		'provincia_id'=>1,
    	] );



    	Canton::create( [
    		'id'=>16,
    		'canton'=>'GUARANDA',
    		'cod_cant'=>'0201',
    		'cod_postal'=>'020150',
    		'latitud'=>'-1.59167',
    		'longitud'=>'-79.00093',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>17,
    		'canton'=>'CHILLANES',
    		'cod_cant'=>'0202',
    		'cod_postal'=>'020250',
    		'latitud'=>'-1.94282',
    		'longitud'=>'-79.0668',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>18,
    		'canton'=>'CHIMBO',
    		'cod_cant'=>'0203',
    		'cod_postal'=>'020350',
    		'latitud'=>'-1.68349',
    		'longitud'=>'-79.02534',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>19,
    		'canton'=>'ECHEANDÍA',
    		'cod_cant'=>'0204',
    		'cod_postal'=>'020450',
    		'latitud'=>'-1.43218',
    		'longitud'=>'-79.28097',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>20,
    		'canton'=>'SAN MIGUEL',
    		'cod_cant'=>'0205',
    		'cod_postal'=>'020550',
    		'latitud'=>'-1.80773',
    		'longitud'=>'-79.07585',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>21,
    		'canton'=>'CALUMA',
    		'cod_cant'=>'0206',
    		'cod_postal'=>'020650',
    		'latitud'=>'-0.27792',
    		'longitud'=>'-78.52267',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>22,
    		'canton'=>'LAS NAVES',
    		'cod_cant'=>'0207',
    		'cod_postal'=>'020701',
    		'latitud'=>'-1.27086',
    		'longitud'=>'-79.32191',
    		'provincia_id'=>2,
    	] );



    	Canton::create( [
    		'id'=>23,
    		'canton'=>'AZOGUES',
    		'cod_cant'=>'0301',
    		'cod_postal'=>'030102',
    		'latitud'=>'-2.74087',
    		'longitud'=>'-78.84747',
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>24,
    		'canton'=>'BIBLIÁN',
    		'cod_cant'=>'0302',
    		'cod_postal'=>'030250',
    		'latitud'=>'-2.71466',
    		'longitud'=>'-78.88457',
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>25,
    		'canton'=>'CAÑAR',
    		'cod_cant'=>'0303',
    		'cod_postal'=>'030350',
    		'latitud'=>'-2.48262',
    		'longitud'=>'-78.97972',
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>26,
    		'canton'=>'LA TRONCAL',
    		'cod_cant'=>'0304',
    		'cod_postal'=>'030450',
    		'latitud'=>'-2.42167',
    		'longitud'=>'-79.34233',
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>27,
    		'canton'=>'EL TAMBO',
    		'cod_cant'=>'0305',
    		'cod_postal'=>'010151',
    		'latitud'=>'-4.07316',
    		'longitud'=>'-79.30845',
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>28,
    		'canton'=>'DÉLEG',
    		'cod_cant'=>'0306',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>29,
    		'canton'=>'SUSCAL',
    		'cod_cant'=>'0307',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>3,
    	] );



    	Canton::create( [
    		'id'=>30,
    		'canton'=>'TULCÁN',
    		'cod_cant'=>'0401',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>31,
    		'canton'=>'BOLÍVAR',
    		'cod_cant'=>'0402',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>32,
    		'canton'=>'ESPEJO',
    		'cod_cant'=>'0403',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>33,
    		'canton'=>'MIRA',
    		'cod_cant'=>'0404',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>34,
    		'canton'=>'MONTÚFAR',
    		'cod_cant'=>'0405',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>35,
    		'canton'=>'SAN PEDRO DE HUACA',
    		'cod_cant'=>'0406',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>4,
    	] );



    	Canton::create( [
    		'id'=>36,
    		'canton'=>'LATACUNGA',
    		'cod_cant'=>'0501',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>37,
    		'canton'=>'LA MANÁ',
    		'cod_cant'=>'0502',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>38,
    		'canton'=>'PANGUA',
    		'cod_cant'=>'0503',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>39,
    		'canton'=>'PUJILI',
    		'cod_cant'=>'0504',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>40,
    		'canton'=>'SALCEDO',
    		'cod_cant'=>'0505',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>41,
    		'canton'=>'SAQUISILÍ',
    		'cod_cant'=>'0506',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>42,
    		'canton'=>'SIGCHOS',
    		'cod_cant'=>'0507',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>5,
    	] );



    	Canton::create( [
    		'id'=>43,
    		'canton'=>'RIOBAMBA',
    		'cod_cant'=>'0601',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>44,
    		'canton'=>'ALAUSI',
    		'cod_cant'=>'0602',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>45,
    		'canton'=>'COLTA',
    		'cod_cant'=>'0603',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>46,
    		'canton'=>'CHAMBO',
    		'cod_cant'=>'0604',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>47,
    		'canton'=>'CHUNCHI',
    		'cod_cant'=>'0605',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>48,
    		'canton'=>'GUAMOTE',
    		'cod_cant'=>'0606',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>49,
    		'canton'=>'GUANO',
    		'cod_cant'=>'0607',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>50,
    		'canton'=>'PALLATANGA',
    		'cod_cant'=>'0608',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>51,
    		'canton'=>'PENIPE',
    		'cod_cant'=>'0609',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>52,
    		'canton'=>'CUMANDÁ',
    		'cod_cant'=>'0610',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>6,
    	] );



    	Canton::create( [
    		'id'=>53,
    		'canton'=>'MACHALA',
    		'cod_cant'=>'0701',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>54,
    		'canton'=>'ARENILLAS',
    		'cod_cant'=>'0702',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>55,
    		'canton'=>'ATAHUALPA',
    		'cod_cant'=>'0703',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>56,
    		'canton'=>'BALSAS',
    		'cod_cant'=>'0704',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>57,
    		'canton'=>'CHILLA',
    		'cod_cant'=>'0705',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>58,
    		'canton'=>'EL GUABO',
    		'cod_cant'=>'0706',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>59,
    		'canton'=>'HUAQUILLAS',
    		'cod_cant'=>'0707',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>60,
    		'canton'=>'MARCABELÍ',
    		'cod_cant'=>'0708',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>61,
    		'canton'=>'PASAJE',
    		'cod_cant'=>'0709',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>62,
    		'canton'=>'PIÑAS',
    		'cod_cant'=>'0710',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>63,
    		'canton'=>'PORTOVELO',
    		'cod_cant'=>'0711',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>64,
    		'canton'=>'SANTA ROSA',
    		'cod_cant'=>'0712',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>65,
    		'canton'=>'ZARUMA',
    		'cod_cant'=>'0713',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>66,
    		'canton'=>'LAS LAJAS',
    		'cod_cant'=>'0714',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>7,
    	] );



    	Canton::create( [
    		'id'=>67,
    		'canton'=>'ESMERALDAS',
    		'cod_cant'=>'0801',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>68,
    		'canton'=>'ELOY ALFARO',
    		'cod_cant'=>'0802',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>69,
    		'canton'=>'MUISNE',
    		'cod_cant'=>'0803',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>70,
    		'canton'=>'QUININDÉ',
    		'cod_cant'=>'0804',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>71,
    		'canton'=>'SAN LORENZO',
    		'cod_cant'=>'0805',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>72,
    		'canton'=>'ATACAMES',
    		'cod_cant'=>'0806',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>73,
    		'canton'=>'RIOVERDE',
    		'cod_cant'=>'0807',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>74,
    		'canton'=>'LA CONCORDIA',
    		'cod_cant'=>'0808',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>8,
    	] );



    	Canton::create( [
    		'id'=>75,
    		'canton'=>'GUAYAQUIL',
    		'cod_cant'=>'0901',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>76,
    		'canton'=>'ALFREDO BAQUERIZO MORENO (JUJÁN)',
    		'cod_cant'=>'0902',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>77,
    		'canton'=>'BALAO',
    		'cod_cant'=>'0903',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>78,
    		'canton'=>'BALZAR',
    		'cod_cant'=>'0904',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>79,
    		'canton'=>'COLIMES',
    		'cod_cant'=>'0905',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>80,
    		'canton'=>'DAULE',
    		'cod_cant'=>'0906',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>81,
    		'canton'=>'DURÁN',
    		'cod_cant'=>'0907',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>82,
    		'canton'=>'EL EMPALME',
    		'cod_cant'=>'0908',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>83,
    		'canton'=>'EL TRIUNFO',
    		'cod_cant'=>'0909',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>84,
    		'canton'=>'MILAGRO',
    		'cod_cant'=>'0910',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>85,
    		'canton'=>'NARANJAL',
    		'cod_cant'=>'0911',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>86,
    		'canton'=>'NARANJITO',
    		'cod_cant'=>'0912',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>87,
    		'canton'=>'PALESTINA',
    		'cod_cant'=>'0913',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>88,
    		'canton'=>'PEDRO CARBO',
    		'cod_cant'=>'0914',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>89,
    		'canton'=>'SAMBORONDÓN',
    		'cod_cant'=>'0916',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>90,
    		'canton'=>'SANTA LUCÍA',
    		'cod_cant'=>'0918',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>91,
    		'canton'=>'SALITRE (URBINA JADO)',
    		'cod_cant'=>'0919',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>92,
    		'canton'=>'SAN JACINTO DE YAGUACHI',
    		'cod_cant'=>'0920',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>93,
    		'canton'=>'PLAYAS',
    		'cod_cant'=>'0921',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>94,
    		'canton'=>'SIMÓN BOLÍVAR',
    		'cod_cant'=>'0922',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>95,
    		'canton'=>'CORONEL MARCELINO MARIDUEÑA',
    		'cod_cant'=>'0923',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>96,
    		'canton'=>'LOMAS DE SARGENTILLO',
    		'cod_cant'=>'0924',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>97,
    		'canton'=>'NOBOL',
    		'cod_cant'=>'0925',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>98,
    		'canton'=>'GENERAL ANTONIO ELIZALDE',
    		'cod_cant'=>'0927',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>99,
    		'canton'=>'ISIDRO AYORA',
    		'cod_cant'=>'0928',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>9,
    	] );



    	Canton::create( [
    		'id'=>100,
    		'canton'=>'IBARRA',
    		'cod_cant'=>'1001',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>101,
    		'canton'=>'ANTONIO ANTE',
    		'cod_cant'=>'1002',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>102,
    		'canton'=>'COTACACHI',
    		'cod_cant'=>'1003',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>103,
    		'canton'=>'OTAVALO',
    		'cod_cant'=>'1004',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>104,
    		'canton'=>'PIMAMPIRO',
    		'cod_cant'=>'1005',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>105,
    		'canton'=>'SAN MIGUEL DE URCUQUÍ',
    		'cod_cant'=>'1006',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>10,
    	] );



    	Canton::create( [
    		'id'=>106,
    		'canton'=>'LOJA',
    		'cod_cant'=>'1101',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>107,
    		'canton'=>'CALVAS',
    		'cod_cant'=>'1102',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>108,
    		'canton'=>'CATAMAYO',
    		'cod_cant'=>'1103',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>109,
    		'canton'=>'CELICA',
    		'cod_cant'=>'1104',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>110,
    		'canton'=>'CHAGUARPAMBA',
    		'cod_cant'=>'1105',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>111,
    		'canton'=>'ESPÍNDOLA',
    		'cod_cant'=>'1106',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>112,
    		'canton'=>'GONZANAMÁ',
    		'cod_cant'=>'1107',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>113,
    		'canton'=>'MACARÁ',
    		'cod_cant'=>'1108',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>114,
    		'canton'=>'PALTAS',
    		'cod_cant'=>'1109',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>115,
    		'canton'=>'PUYANGO',
    		'cod_cant'=>'1110',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>116,
    		'canton'=>'SARAGURO',
    		'cod_cant'=>'1111',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>117,
    		'canton'=>'SOZORANGA',
    		'cod_cant'=>'1112',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>118,
    		'canton'=>'ZAPOTILLO',
    		'cod_cant'=>'1113',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>119,
    		'canton'=>'PINDAL',
    		'cod_cant'=>'1114',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>120,
    		'canton'=>'QUILANGA',
    		'cod_cant'=>'1115',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>121,
    		'canton'=>'OLMEDO',
    		'cod_cant'=>'1116',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>11,
    	] );



    	Canton::create( [
    		'id'=>122,
    		'canton'=>'BABAHOYO',
    		'cod_cant'=>'1201',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>123,
    		'canton'=>'BABA',
    		'cod_cant'=>'1202',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>124,
    		'canton'=>'MONTALVO',
    		'cod_cant'=>'1203',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>125,
    		'canton'=>'PUEBLOVIEJO',
    		'cod_cant'=>'1204',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>126,
    		'canton'=>'QUEVEDO',
    		'cod_cant'=>'1205',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>127,
    		'canton'=>'URDANETA',
    		'cod_cant'=>'1206',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>128,
    		'canton'=>'VENTANAS',
    		'cod_cant'=>'1207',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>129,
    		'canton'=>'VÍNCES',
    		'cod_cant'=>'1208',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>130,
    		'canton'=>'PALENQUE',
    		'cod_cant'=>'1209',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>131,
    		'canton'=>'BUENA FÉ',
    		'cod_cant'=>'1210',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>132,
    		'canton'=>'VALENCIA',
    		'cod_cant'=>'1211',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>133,
    		'canton'=>'MOCACHE',
    		'cod_cant'=>'1212',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>134,
    		'canton'=>'QUINSALOMA',
    		'cod_cant'=>'1213',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>12,
    	] );



    	Canton::create( [
    		'id'=>135,
    		'canton'=>'PORTOVIEJO',
    		'cod_cant'=>'1301',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>136,
    		'canton'=>'BOLÍVAR',
    		'cod_cant'=>'1302',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>137,
    		'canton'=>'CHONE',
    		'cod_cant'=>'1303',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>138,
    		'canton'=>'EL CARMEN',
    		'cod_cant'=>'1304',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>139,
    		'canton'=>'FLAVIO ALFARO',
    		'cod_cant'=>'1305',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>140,
    		'canton'=>'JIPIJAPA',
    		'cod_cant'=>'1306',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>141,
    		'canton'=>'JUNÍN',
    		'cod_cant'=>'1307',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>142,
    		'canton'=>'MANTA',
    		'cod_cant'=>'1308',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>143,
    		'canton'=>'MONTECRISTI',
    		'cod_cant'=>'1309',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>144,
    		'canton'=>'PAJÁN',
    		'cod_cant'=>'1310',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>145,
    		'canton'=>'PICHINCHA',
    		'cod_cant'=>'1311',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>146,
    		'canton'=>'ROCAFUERTE',
    		'cod_cant'=>'1312',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>147,
    		'canton'=>'SANTA ANA',
    		'cod_cant'=>'1313',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>148,
    		'canton'=>'SUCRE',
    		'cod_cant'=>'1314',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>149,
    		'canton'=>'TOSAGUA',
    		'cod_cant'=>'1315',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>150,
    		'canton'=>'24 DE MAYO',
    		'cod_cant'=>'1316',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>151,
    		'canton'=>'PEDERNALES',
    		'cod_cant'=>'1317',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>152,
    		'canton'=>'OLMEDO',
    		'cod_cant'=>'1318',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>153,
    		'canton'=>'PUERTO LÓPEZ',
    		'cod_cant'=>'1319',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>154,
    		'canton'=>'JAMA',
    		'cod_cant'=>'1320',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>155,
    		'canton'=>'JARAMIJÓ',
    		'cod_cant'=>'1321',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>156,
    		'canton'=>'SAN VICENTE',
    		'cod_cant'=>'1322',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>13,
    	] );



    	Canton::create( [
    		'id'=>157,
    		'canton'=>'MORONA',
    		'cod_cant'=>'1401',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>158,
    		'canton'=>'GUALAQUIZA',
    		'cod_cant'=>'1402',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>159,
    		'canton'=>'LIMÓN INDANZA',
    		'cod_cant'=>'1403',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>160,
    		'canton'=>'PALORA',
    		'cod_cant'=>'1404',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>161,
    		'canton'=>'SANTIAGO',
    		'cod_cant'=>'1405',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>162,
    		'canton'=>'SUCÚA',
    		'cod_cant'=>'1406',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>163,
    		'canton'=>'HUAMBOYA',
    		'cod_cant'=>'1407',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>164,
    		'canton'=>'SAN JUAN BOSCO',
    		'cod_cant'=>'1408',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>165,
    		'canton'=>'TAISHA',
    		'cod_cant'=>'1409',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>166,
    		'canton'=>'LOGROÑO',
    		'cod_cant'=>'1410',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>167,
    		'canton'=>'PABLO SEXTO',
    		'cod_cant'=>'1411',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>168,
    		'canton'=>'TIWINTZA',
    		'cod_cant'=>'1412',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>169,
    		'canton'=>'TENA',
    		'cod_cant'=>'1501',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>170,
    		'canton'=>'ARCHIDONA',
    		'cod_cant'=>'1503',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>171,
    		'canton'=>'EL CHACO',
    		'cod_cant'=>'1504',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>172,
    		'canton'=>'QUIJOS',
    		'cod_cant'=>'1507',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>173,
    		'canton'=>'CARLOS JULIO AROSEMENA TOLA',
    		'cod_cant'=>'1509',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>14,
    	] );



    	Canton::create( [
    		'id'=>174,
    		'canton'=>'PASTAZA',
    		'cod_cant'=>'1601',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>16,
    	] );



    	Canton::create( [
    		'id'=>175,
    		'canton'=>'MERA',
    		'cod_cant'=>'1602',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>16,
    	] );



    	Canton::create( [
    		'id'=>176,
    		'canton'=>'SANTA CLARA',
    		'cod_cant'=>'1603',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>16,
    	] );



    	Canton::create( [
    		'id'=>177,
    		'canton'=>'ARAJUNO',
    		'cod_cant'=>'1604',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>16,
    	] );



    	Canton::create( [
    		'id'=>178,
    		'canton'=>'QUITO',
    		'cod_cant'=>'1701',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>179,
    		'canton'=>'CAYAMBE',
    		'cod_cant'=>'1702',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>180,
    		'canton'=>'MEJIA',
    		'cod_cant'=>'1703',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>181,
    		'canton'=>'PEDRO MONCAYO',
    		'cod_cant'=>'1704',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>182,
    		'canton'=>'RUMIÑAHUI',
    		'cod_cant'=>'1705',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>183,
    		'canton'=>'SAN MIGUEL DE LOS BANCOS',
    		'cod_cant'=>'1707',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>184,
    		'canton'=>'PEDRO VICENTE MALDONADO',
    		'cod_cant'=>'1708',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>185,
    		'canton'=>'PUERTO QUITO',
    		'cod_cant'=>'1709',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>17,
    	] );



    	Canton::create( [
    		'id'=>186,
    		'canton'=>'AMBATO',
    		'cod_cant'=>'1801',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>187,
    		'canton'=>'BAÑOS DE AGUA SANTA',
    		'cod_cant'=>'1802',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>188,
    		'canton'=>'CEVALLOS',
    		'cod_cant'=>'1803',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>189,
    		'canton'=>'MOCHA',
    		'cod_cant'=>'1804',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>190,
    		'canton'=>'PATATE',
    		'cod_cant'=>'1805',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>191,
    		'canton'=>'QUERO',
    		'cod_cant'=>'1806',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>192,
    		'canton'=>'SAN PEDRO DE PELILEO',
    		'cod_cant'=>'1807',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>193,
    		'canton'=>'SANTIAGO DE PÍLLARO',
    		'cod_cant'=>'1808',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>194,
    		'canton'=>'TISALEO',
    		'cod_cant'=>'1809',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>18,
    	] );



    	Canton::create( [
    		'id'=>195,
    		'canton'=>'ZAMORA',
    		'cod_cant'=>'1901',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>196,
    		'canton'=>'CHINCHIPE',
    		'cod_cant'=>'1902',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>197,
    		'canton'=>'NANGARITZA',
    		'cod_cant'=>'1903',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>198,
    		'canton'=>'YACUAMBI',
    		'cod_cant'=>'1904',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>199,
    		'canton'=>'YANTZAZA (YANZATZA)',
    		'cod_cant'=>'1905',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>200,
    		'canton'=>'EL PANGUI',
    		'cod_cant'=>'1906',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>201,
    		'canton'=>'CENTINELA DEL CÓNDOR',
    		'cod_cant'=>'1907',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>202,
    		'canton'=>'PALANDA',
    		'cod_cant'=>'1908',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>203,
    		'canton'=>'PAQUISHA',
    		'cod_cant'=>'1909',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>19,
    	] );



    	Canton::create( [
    		'id'=>204,
    		'canton'=>'SAN CRISTÓBAL',
    		'cod_cant'=>'2001',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>20,
    	] );



    	Canton::create( [
    		'id'=>205,
    		'canton'=>'ISABELA',
    		'cod_cant'=>'2002',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>20,
    	] );



    	Canton::create( [
    		'id'=>206,
    		'canton'=>'SANTA CRUZ',
    		'cod_cant'=>'2003',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>20,
    	] );



    	Canton::create( [
    		'id'=>207,
    		'canton'=>'LAGO AGRIO',
    		'cod_cant'=>'2101',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>208,
    		'canton'=>'GONZALO PIZARRO',
    		'cod_cant'=>'2102',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>209,
    		'canton'=>'PUTUMAYO',
    		'cod_cant'=>'2103',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>210,
    		'canton'=>'SHUSHUFINDI',
    		'cod_cant'=>'2104',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>211,
    		'canton'=>'SUCUMBÍOS',
    		'cod_cant'=>'2105',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>212,
    		'canton'=>'CASCALES',
    		'cod_cant'=>'2106',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>213,
    		'canton'=>'CUYABENO',
    		'cod_cant'=>'2107',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>21,
    	] );



    	Canton::create( [
    		'id'=>214,
    		'canton'=>'ORELLANA',
    		'cod_cant'=>'2201',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>22,
    	] );



    	Canton::create( [
    		'id'=>215,
    		'canton'=>'AGUARICO',
    		'cod_cant'=>'2202',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>22,
    	] );



    	Canton::create( [
    		'id'=>216,
    		'canton'=>'LA JOYA DE LOS SACHAS',
    		'cod_cant'=>'2203',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>22,
    	] );



    	Canton::create( [
    		'id'=>217,
    		'canton'=>'LORETO',
    		'cod_cant'=>'2204',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>22,
    	] );



    	Canton::create( [
    		'id'=>218,
    		'canton'=>'SANTO DOMINGO',
    		'cod_cant'=>'2301',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>24,
    	] );



    	Canton::create( [
    		'id'=>219,
    		'canton'=>'SANTA ELENA',
    		'cod_cant'=>'2401',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>24,
    	] );



    	Canton::create( [
    		'id'=>220,
    		'canton'=>'LA LIBERTAD',
    		'cod_cant'=>'2402',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>24,
    	] );



    	Canton::create( [
    		'id'=>221,
    		'canton'=>'SALINAS',
    		'cod_cant'=>'2403',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>24,
    	] );



    	Canton::create( [
    		'id'=>222,
    		'canton'=>'LAS GOLONDRINAS',
    		'cod_cant'=>'9001',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>25,
    	] );



    	Canton::create( [
    		'id'=>223,
    		'canton'=>'MANGA DEL CURA',
    		'cod_cant'=>'9003',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>25,
    	] );



    	Canton::create( [
    		'id'=>224,
    		'canton'=>'EL PIEDRERO',
    		'cod_cant'=>'9004',
    		'cod_postal'=>1,
    		'latitud'=>1,
    		'longitud'=>1,
    		'provincia_id'=>25,
    	] );

    }
}
