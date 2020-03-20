<?php

namespace app\models;

use Yii;

class PorRentaVariable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_renta_variable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PorId'], 'required'],
            [['PorId', 'TivId', 'Cupon', 'DiasTranscurridos', 'PlazoTotal', 'PlazoVencer', 'DiasAcrual', 'Cantidad', 'TpoId'], 'integer'],
            [['FechaRegistro', 'FechaVencimiento', 'FechaEmision', 'FechaCorte', 'FechaCompra', 'FechaCapital', 'FechaInteres', 'FechaAcrual', 'FechaCalificacion'], 'safe'],
            [['Codigo', 'Emisor', 'Sector', 'TipoRenta', 'TipoValor', 'Subtipo', 'TipoTasa', 'TituloCodigo', 'MonedaNombre', 'MonedaCodigo', 'Plazo', 'TipoCategoria', 'Numeracion', 'DesmaterializadoNombre', 'Valor', 'Calificadora', 'TipoBase', 'Custodio', 'SiglasTipoValor', 'GrupoTipoValor', 'CodigoEmisor', 'CodigoSic', 'CodigoSicGen'], 'string'],
            [['TituloTasaInteres', 'TituloPrecioSpot', 'ValorEfectivo', 'ValorNominalUnitario', 'ValorNominalTotal', 'TituloRendimiento', 'InteresAcumulado', 'TituloTasaMargen', 'TituloTasaCuponRemanente', 'RendimientoOperacion', 'ValorEfectivoCompra', 'PrecioCompra', 'TituloTipoRenta', 'InteresTotal', 'InteresTranscurrido', 'CostosIncurridos', 'DividendoAccion', 'DividendoEfectivo', 'TasaInteresIni'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prv_id' => 'Prv ID',
            'PorId' => 'Por ID',
            'FechaRegistro' => 'Fecha Registro',
            'TivId' => 'Tiv ID',
            'Codigo' => 'Codigo',
            'Emisor' => 'Emisor',
            'Sector' => 'Sector',
            'TipoRenta' => 'Tipo Renta',
            'TipoValor' => 'Tipo Valor',
            'Subtipo' => 'Subtipo',
            'TipoTasa' => 'Tipo Tasa',
            'TituloTasaInteres' => 'Titulo Tasa Interes',
            'TituloPrecioSpot' => 'Titulo Precio Spot',
            'ValorEfectivo' => 'Valor Efectivo',
            'ValorNominalUnitario' => 'Valor Nominal Unitario',
            'ValorNominalTotal' => 'Valor Nominal Total',
            'TituloCodigo' => 'Titulo Codigo',
            'TituloRendimiento' => 'Titulo Rendimiento',
            'InteresAcumulado' => 'Interes Acumulado',
            'TituloTasaMargen' => 'Titulo Tasa Margen',
            'TituloTasaCuponRemanente' => 'Titulo Tasa Cupon Remanente',
            'MonedaNombre' => 'Moneda Nombre',
            'MonedaCodigo' => 'Moneda Codigo',
            'Plazo' => 'Plazo',
            'Cupon' => 'Cupon',
            'TipoCategoria' => 'Tipo Categoria',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'FechaEmision' => 'Fecha Emision',
            'FechaCorte' => 'Fecha Corte',
            'Numeracion' => 'Numeracion',
            'DesmaterializadoNombre' => 'Desmaterializado Nombre',
            'DiasTranscurridos' => 'Dias Transcurridos',
            'FechaCompra' => 'Fecha Compra',
            'PlazoTotal' => 'Plazo Total',
            'PlazoVencer' => 'Plazo Vencer',
            'FechaCapital' => 'Fecha Capital',
            'FechaInteres' => 'Fecha Interes',
            'DiasAcrual' => 'Dias Acrual',
            'FechaAcrual' => 'Fecha Acrual',
            'Cantidad' => 'Cantidad',
            'Valor' => 'Valor',
            'Calificadora' => 'Calificadora',
            'TipoBase' => 'Tipo Base',
            'Custodio' => 'Custodio',
            'RendimientoOperacion' => 'Rendimiento Operacion',
            'FechaCalificacion' => 'Fecha Calificacion',
            'SiglasTipoValor' => 'Siglas Tipo Valor',
            'GrupoTipoValor' => 'Grupo Tipo Valor',
            'ValorEfectivoCompra' => 'Valor Efectivo Compra',
            'PrecioCompra' => 'Precio Compra',
            'CodigoEmisor' => 'Codigo Emisor',
            'TituloTipoRenta' => 'Titulo Tipo Renta',
            'InteresTotal' => 'Interes Total',
            'InteresTranscurrido' => 'Interes Transcurrido',
            'CostosIncurridos' => 'Costos Incurridos',
            'DividendoAccion' => 'Aumento de capital',
            'DividendoEfectivo' => 'Dividendo Efectivo',
            'CodigoSic' => 'Codigo Sic',
            'CodigoSicGen' => 'Codigo Sic Gen',
            'TasaInteresIni' => 'Tasa Interes Ini',
            'TpoId' => 'Tpo ID',
        ];
    }
}
