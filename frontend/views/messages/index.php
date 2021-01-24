<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/chat.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <h1><?= Html::encode($this->title); ?></h1>



    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="chat_container">
            <div class="chat_itembox">
                    <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => function ($model, $key, $index, $widget) {
                                return '<div class="chat_message_item"><div class="chat_message_autor">Сообщение от:'.$model->owner.'</div> <div class="chat_message_body">'.$model->body.'</div></div>';
                            },
                    ]); ?>
            </div>

            <div class="chat_user_list">Собеседники:</div>
    </div>
    <div class="send_message_box">
        <div class="send_message_form">
            <form action="sendMessage">
                <textarea class='send_message_area form-control' id="messageArea" >Напишите свое сообщение!</textarea>
            </form>
        </div>
        <div class="send_message_button">
                        <button id='sendMessage' type='botton' class='send_button btn btn-info'>Отправить</button>
        </div>
    </div>
</div>
