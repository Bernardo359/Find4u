<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserProfile $model */

$this->title = 'Update User: ' . $profile->nome;
?>
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      
      <div class="modal-body">
        <?= $this->render('_form', [
            'profile' => $profile,
            'user' => $user,
        ]) ?>
      </div>
      
    </div>
  </div>
</div>

