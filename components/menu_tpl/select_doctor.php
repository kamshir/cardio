<option value="<?= $category['id'] ?>">
    <?= $tab . $category['last_name'] . ' ' . mb_substr($category['first_name'], 0, 1) . '.' . mb_substr($category['middle_name'], 0, 1) . ' (' . $category['speciality']['title'] . ')'?>
</option>