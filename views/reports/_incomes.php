<div class="incomes">
    <h2>Доходы</h2>
    <div class="stat-inner">
        <div>
            <div>
                <h2><?= $sum ?> рублей</h2>
                <p>Всего</p>
            </div>
        </div>
        <div>
            <?php if (!empty($min) || !empty($max)): ?>
                <div>
                    <h2><?= $min['amount'] ?> рублей</h2>
                    <p>Наименьшая трата</p>
                    <p><?= $min['type_of_incomes'] ?></p>
                    <p><?= $min['date'] ?></p>
                </div>
                <div>
                    <h2><?= $max['amount'] ?> рублей</h2>
                    <p>Наибольшая трата</p>
                    <p><?= $max['type_of_incomes'] ?></p>
                    <p><?= $max['date'] ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>