<?php

use common\components\HiddenRemoval;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */

$this->title = 'Dodaj zestaw';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="zestaw-userZestaw" align="center">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <button id="endButton" class="btn btn-success" onClick="sentToPhp()">Zakończ</button>
    </div>
    <?= $form->field($model, 'zestaw')->hiddenInput(['rows' => 6])->label(false) ?>



    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'podkategoria_id')->dropDownList($podkategorie) ?>


    <?php ActiveForm::end(); ?>
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-xs-2">
            <label id="slowko1Label" for="slowko1Input">Słówko po angielsku:</label>
            <input class="form-control" id="slowko1Input" type="text">
        </div>
        <div class="col-xs-2">
            <label id="slowko2Label" for="slowko2Input">Słówko po polsku:</label>
            <input class="form-control" id="slowko2Input" type="text">
        </div>
        <div class="col-xs-2">
            <label id="slowko2Label" for="nextPairButton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <button id="nextPairButton" class="btn btn-primary" onClick="appendRow()">Następne słówko</button>
        </div>
    </div>
    <br>
    <div align="center">
    </div>

    <div id="table"style="height: 300px; overflow: auto;" class="hidden">
        <table id="myTable" class="table table-striped table-bordered"
               >
            <thead>
            <tr class="bg-primary">
                <th style="width: 45%" scope="col">Angielski</th>
                <th style="width: 45%" scope="col">Polski</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


</div>

<script>
    let i = 0;
    let array = [];

    function appendRow() {
        let input1Text = document.getElementById('slowko1Input').value;
        let input2Text = document.getElementById('slowko2Input').value;
        if (input1Text != "" && input2Text != "") {
            document.getElementById('table').classList.remove('hidden');

            document.getElementById('slowko1Input').value = "";
            document.getElementById('slowko2Input').value = "";
            array[i] = input1Text + ';' + input2Text + '\n';
            i++;
            let idRow = "rowId" + i;
            $('#myTable tbody').append(
                '<tr id="' + idRow + '">' +
                '<td>' + input1Text + '</td>' +
                '<td>' + input2Text + '</td>' +
                '<td><button type="button"  onClick="removeRow(\'' + idRow + '\')" class="btn btn-danger">Usuń</button></td>' +
                '</tr>');
        }else
            swal('Nie możesz zostawić pustych pól!');
    }

    function removeRow(clicked_id) {
        let row = document.getElementById(clicked_id);
        let index = clicked_id.replace(/[^\d.]/g, '');
        array.splice(index);
        row.parentNode.removeChild(row);
    }

    function sentToPhp() {
        document.getElementById('zestaw-zestaw').value=array.join('');
    }
</script>