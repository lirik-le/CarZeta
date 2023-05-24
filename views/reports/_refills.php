<div class="refills">
    <h2>Заправки</h2>
    <div class="stat-inner stat-refills">
        <div>
            <div>
                <h2><?= $sum ?> рублей</h2>
                <p>Всего</p>
            </div>
            <div>
                <h2><?= $liters ?> литров</h2>
                <p>Всего</p>
            </div>
            <div>
                <h2><?php echo '~' . $sum / $liters ?> р/л</h2>
                <p>Средняя цена<br> за литр</p>
            </div>
        </div>
        <div>
            <?php if (!empty($min) || !empty($max)): ?>
                <div>
                    <h2><?= $min['amount'] ?> рублей</h2>
                    <p>Наименьшая трата</p>
                    <p><?= $min['liters'] ?> литров</p>
                    <p><?= $min['date'] ?></p>
                </div>
                <div>
                    <h2><?= $max['amount'] ?> рублей</h2>
                    <p>Наибольшая трата</p>
                    <p><?= $max['liters'] ?> литров</p>
                    <p><?= $max['date'] ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>