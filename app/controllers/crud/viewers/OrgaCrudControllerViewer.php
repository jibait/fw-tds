<?php
namespace controllers\crud\viewers;

use Ajax\semantic\widgets\dataform\DataForm;
use Ajax\semantic\widgets\datatable\DataTable;
use Ubiquity\controllers\crud\viewers\ModelViewer;
 /**
  * Class OrgaCrudControllerViewer
  */
class OrgaCrudControllerViewer extends ModelViewer{
    public function getDataTableRowButtons(): array
    {
        return ['display','edit','delete'];
    }

    public function getModelDataTable($instances, $model, $totalCount, $page = 1): DataTable
    {
        $dt = parent::getModelDataTable($instances, $model, $totalCount, $page);
        $dt->fieldAsLabel('domain', 'mail');
        $dt->setEdition(true);
        return $dt;
    }

    protected function setFormFieldsComponent_(DataForm $form, $fieldTypes, $attributes = [])
    {
        $form->fieldAsInput('id',['disabled' => true]);
    }

}
