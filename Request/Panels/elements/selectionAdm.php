  <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" name="select">
    <option disabled selected>Выбрать действие</option>
    <option value="setting.php?re=nS&numberS=<?=$row['№']?>&select=1">Отклонить</option>
    <option value="setting.php?re=nS&numberS=<?=$row['№']?>&select=3">Принять</option>
    <option value="setting.php?re=dR&numberReq=<?=$row['№']?>">Удалить</option>
  </select>