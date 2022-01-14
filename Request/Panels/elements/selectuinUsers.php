<select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" name="select">
    <option disabled selected>Выбрать действие</option>
    <option value="redRequest.php?number=<?=$row['№']?>">Редактировать</option>
    <option value="setting.php?re=dR&numberReq=<?=$row['№']?>">Удалить</option>
  </select>