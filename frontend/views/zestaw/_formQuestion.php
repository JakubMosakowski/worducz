<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zestaw-form">
    <div class="grid-view">
        <div class="row"  align="center" style="margin: 10% auto 0;">
            <div class="col-xs-3" style="float: none;">
                <label for="ex2">Słówko po ang</label>
                <input class="form-control" id="ex2" type="text" readonly>
            </div>
            <div class="col-xs-2" style="float: none;">
                <br>
                <label for="ex3">Słówko po polsku</label>
                <input class="form-control" id="ex3" type="text">
            </div>
        </div>

        <div id="description" class="row" align="center" >
            <p>
                <br>
                Udało lub nie udało <br>
                Jak udało to na zielono jak nie udało to na czerwono ( schowaj na logowaniu)
            </p>

        </div>

        <div class="row" align="center">

                <button id="nextQuestionButton" onClick="showDesc()" class="btn btn-primary">Sprawdź</button>

        </div>
    </div>

    <script type="text/javascript">
        function showDesc() {
                document.getElementById('description').style.visibility = "hidden";

            }
        }

    </script>
</div>

