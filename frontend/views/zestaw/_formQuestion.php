<?php

use app\models\Wynik;
use common\components\StringConverter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
/* @var integer $firstLang */
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="zestaw-form">
    <?php
    $sconv = new StringConverter();
    $array = $sconv->convertStringToArray($model->zestaw);
    $fLang = $firstLang;
    $algNo = $algorithmNumber;
    $ifSave = $save;

    ?>
    <div class="grid-view">
        <div class="row" align="center" style="margin: 10% auto 0;">
            <div class="col-xs-3" style="float: none;">
                <label id="slowko1Label" for="forCode"></label>
                <input class="form-control" id="forCode" type="text" readonly>
            </div>
            <div class="col-xs-2" style="float: none;">
                <br>
                <label id="slowko2Label" for="forUser">Przetłumacz:</label>
                <input class="form-control" id="forUser" type="text">
            </div>
        </div>

        <div id="description" class="row" align="center" style="margin: 15px 0; visibility: hidden">
            Jak udało to na zielono jak nie udało to na czerwono (schowaj na logowaniu)
        </div>

        <div class="row" align="center">
            <button id="nextQuestionButton" class="btn btn-primary">Sprawdź</button>
        </div>
    </div>

    <script>
        let counter = 0;
        let userResult = 0;
        let array;
        let firstLang;
        let secondLang;
        let algorithmNo;
        let algorithmNumber1;
        let algorithmNumber2;
        let description = document.getElementById("description");
        let forUser = document.getElementById("forUser");
        let forCode = document.getElementById("forCode");
        let mix = false;
        let save;
        var input = document.getElementById("forUser");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function (event) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Trigger the button element with a click
                document.getElementById("nextQuestionButton").click();
            }
        });


        Array.prototype.shuffle = function () {
            var input = this;
            for (var i = input.length - 1; i >= 0; i--) {

                var randomIndex = Math.floor(Math.random() * (i + 1));
                var itemAtIndex = input[randomIndex];

                input[randomIndex] = input[i];
                input[i] = itemAtIndex;
            }
            return input;
        };
        algorithmNumber1 = function showDescAlg1() {
            let text;
            let userText = forUser.value;

            if (counter < array.length) {
                forUser.value = "";
                description.style.visibility = 'visible';

                if (isCorrect(array[counter][secondLang], userText)) {
                    description.style.color = 'red';
                    text = 'Źle! Poprawnym tłumaczeniem "' + array[counter][firstLang] + '" jest "' + array[counter][secondLang]+'"!';

                }
                else {
                    userResult++;
                    description.style.color = 'green';
                    text = 'Dobrze!';
                }
                counter++;
                if (algorithmNo == 3) {
                    let temp;
                    temp = firstLang;
                    firstLang = secondLang;
                    secondLang = temp;
                }
                if (counter !== array.length) {
                    forCode.value = array[counter][firstLang];
                } else {
                    text = finish(text);
                }
            } else {
                text = finish(text);
            }
            description.innerHTML = text;
        };

        function finish(text) {
            userResult = userResult * 100 / array.length;
            userResult = Math.round(userResult);
            text = 'Koniec';
            description.style.color = 'green';
            forCode.value = '';
            let finishText = 'Twój wynik to: ' + userResult + '%';
            if (typeof swal !== 'undefined') {
                swal("Gratulacje", finishText, "success").then((value) => {
                    if (save == 1) {
                        let url = document.referrer;
                        url += '&save='+userResult;
                        window.location.href=url;
                    }
                    else
                        history.go(-1);


                });
            } else {
                alert(finishText);
                if (save == 1) {
                    let url = document.referrer;
                    url += '&save='+userResult;
                    window.location.href=url;
                }
                else
                    history.go(-1);
            }

            return text;
        }

        algorithmNumber2 = function showDescAlg2() {
            let text;
            let userText = forUser.value;

            if (counter < array.length) {
                forUser.value = "";
                description.style.visibility = 'visible';

                if (isCorrect(array[counter][secondLang], userText)) {
                    description.style.color = 'red';
                    text = 'Źle! Poprawnym tłumaczeniem "' + array[counter][firstLang] + '" jest "' + array[counter][secondLang]+'"!';
                    n = array.length;
                    if (firstLang == 1)
                        array.push([array[counter][secondLang], array[counter][firstLang]]);
                    else
                        array.push([array[counter][firstLang], array[counter][secondLang]]);

                }
                else {
                    userResult++;
                    description.style.color = 'green';
                    text = 'Dobrze!';
                }
                counter++;
                if (counter !== array.length) {
                    forCode.value = array[counter][firstLang];
                } else {
                    text = finish(text);
                }
            } else {
                text = finish(text);
            }
            description.innerHTML = text;
        };
        window.onloadstart = enterInitialValues();

        function setSecondLanguageValue() {
            if (firstLang === 1)
                secondLang = 0;
            else
                secondLang = 1;
        }

        function setAlgorithm() {
            if (algorithmNo == 1)
                document.getElementById('nextQuestionButton').onclick = algorithmNumber1;
            else if (algorithmNo == 2)
                document.getElementById('nextQuestionButton').onclick = algorithmNumber2;
            else {
                mix = true;
                document.getElementById('nextQuestionButton').onclick = algorithmNumber1;
            }
        }

        function enterInitialValues() {
            shuffleArray();
            firstLang =<?php echo $fLang ?>;
            algorithmNo =<?php echo $algNo ?>;
            save =<?php echo $ifSave ?>;
            setSecondLanguageValue();
            setAlgorithm();

            forCode.value = array[0][firstLang];
        }

        function shuffleArray() {
            array = JSON.parse('<?php echo json_encode($array); ?>');
            array.shuffle();
        }

        function reformatingText(val){
            val=val.toUpperCase();
            val=val.trim();
            val=val.replace(/\s{2,}/g, ' ');

            return val;
        }

        function isCorrect(correct, userInput) {
            correct=reformatingText(correct);
            userInput=reformatingText(userInput);

            let result = correct.localeCompare(userInput);
            if (result)
                return true;
            else {
                return false;
            }
        }

    </script>

</div>

