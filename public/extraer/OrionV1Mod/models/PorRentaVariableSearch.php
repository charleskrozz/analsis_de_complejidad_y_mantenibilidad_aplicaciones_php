<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorRentaVariable;
use yii\db\Query;
/**
 * PorRentaVariableSearch represents the model behind the search form about `app\models\PorRentaVariable`.
 */
class PorRentaVariableSearch extends PorRentaVariable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prv_id', 'PorId', 'TivId', 'Cupon', 'DiasTranscurridos', 'PlazoTotal', 'PlazoVencer', 'DiasAcrual', 'Cantidad', 'TpoId'], 'integer'],
            [['FechaRegistro', 'Codigo', 'Emisor', 'Sector', 'TipoRenta', 'TipoValor', 'Subtipo', 'TipoTasa', 'TituloCodigo', 'MonedaNombre', 'MonedaCodigo', 'Plazo', 'TipoCategoria', 'FechaVencimiento', 'FechaEmision', 'FechaCorte', 'Numeracion', 'DesmaterializadoNombre', 'FechaCompra', 'FechaCapital', 'FechaInteres', 'FechaAcrual', 'Valor', 'Calificadora', 'TipoBase', 'Custodio', 'FechaCalificacion', 'SiglasTipoValor', 'GrupoTipoValor', 'CodigoEmisor', 'CodigoSic', 'CodigoSicGen'], 'safe'],
            [['TituloTasaInteres', 'TituloPrecioSpot', 'ValorEfectivo', 'ValorNominalUnitario', 'ValorNominalTotal', 'TituloRendimiento', 'InteresAcumulado', 'TituloTasaMargen', 'TituloTasaCuponRemanente', 'RendimientoOperacion', 'ValorEfectivoCompra', 'PrecioCompra', 'TituloTipoRenta', 'InteresTotal', 'InteresTranscurrido', 'CostosIncurridos', 'DividendoAccion', 'DividendoEfectivo', 'TasaInteresIni'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PorRentaVariable::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'prv_id' => $this->prv_id,
            'PorId' => $this->PorId,
            'FechaRegistro' => $this->FechaRegistro,
            'TivId' => $this->TivId,
            'TituloTasaInteres' => $this->TituloTasaInteres,
            'TituloPrecioSpot' => $this->TituloPrecioSpot,
            'ValorEfectivo' => $this->ValorEfectivo,
            'ValorNominalUnitario' => $this->ValorNominalUnitario,
            'ValorNominalTotal' => $this->ValorNominalTotal,
            'TituloRendimiento' => $this->TituloRendimiento,
            'InteresAcumulado' => $this->InteresAcumulado,
            'TituloTasaMargen' => $this->TituloTasaMargen,
            'TituloTasaCuponRemanente' => $this->TituloTasaCuponRemanente,
            'Cupon' => $this->Cupon,
            'FechaVencimiento' => $this->FechaVencimiento,
            'FechaEmision' => $this->FechaEmision,
            'FechaCorte' => $this->FechaCorte,
            'DiasTranscurridos' => $this->DiasTranscurridos,
            'FechaCompra' => $this->FechaCompra,
            'PlazoTotal' => $this->PlazoTotal,
            'PlazoVencer' => $this->PlazoVencer,
            'FechaCapital' => $this->FechaCapital,
            'FechaInteres' => $this->FechaInteres,
            'DiasAcrual' => $this->DiasAcrual,
            'FechaAcrual' => $this->FechaAcrual,
            'Cantidad' => $this->Cantidad,
            'RendimientoOperacion' => $this->RendimientoOperacion,
            'FechaCalificacion' => $this->FechaCalificacion,
            'ValorEfectivoCompra' => $this->ValorEfectivoCompra,
            'PrecioCompra' => $this->PrecioCompra,
            'TituloTipoRenta' => $this->TituloTipoRenta,
            'InteresTotal' => $this->InteresTotal,
            'InteresTranscurrido' => $this->InteresTranscurrido,
            'CostosIncurridos' => $this->CostosIncurridos,
            'DividendoAccion' => $this->DividendoAccion,
            'DividendoEfectivo' => $this->DividendoEfectivo,
            'TasaInteresIni' => $this->TasaInteresIni,
            'TpoId' => $this->TpoId,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'Emisor', $this->Emisor])
            ->andFilterWhere(['like', 'Sector', $this->Sector])
            ->andFilterWhere(['like', 'TipoRenta', $this->TipoRenta])
            ->andFilterWhere(['like', 'TipoValor', $this->TipoValor])
            ->andFilterWhere(['like', 'Subtipo', $this->Subtipo])
            ->andFilterWhere(['like', 'TipoTasa', $this->TipoTasa])
            ->andFilterWhere(['like', 'TituloCodigo', $this->TituloCodigo])
            ->andFilterWhere(['like', 'MonedaNombre', $this->MonedaNombre])
            ->andFilterWhere(['like', 'MonedaCodigo', $this->MonedaCodigo])
            ->andFilterWhere(['like', 'Plazo', $this->Plazo])
            ->andFilterWhere(['like', 'TipoCategoria', $this->TipoCategoria])
            ->andFilterWhere(['like', 'Numeracion', $this->Numeracion])
            ->andFilterWhere(['like', 'DesmaterializadoNombre', $this->DesmaterializadoNombre])
            ->andFilterWhere(['like', 'Valor', $this->Valor])
            ->andFilterWhere(['like', 'Calificadora', $this->Calificadora])
            ->andFilterWhere(['like', 'TipoBase', $this->TipoBase])
            ->andFilterWhere(['like', 'Custodio', $this->Custodio])
            ->andFilterWhere(['like', 'SiglasTipoValor', $this->SiglasTipoValor])
            ->andFilterWhere(['like', 'GrupoTipoValor', $this->GrupoTipoValor])
            ->andFilterWhere(['like', 'CodigoEmisor', $this->CodigoEmisor])
            ->andFilterWhere(['like', 'CodigoSic', $this->CodigoSic])
            ->andFilterWhere(['like', 'CodigoSicGen', $this->CodigoSicGen]);

        return $dataProvider;
    }
}
