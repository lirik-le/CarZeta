<div  class="refills">
    <h2>Заправки</h2>
    <div class="stat-inner stat-refills">
        <div>
            <h3><?= $sum ?> рублей</h3>
        </div>
        <div>
            <h3><?= $liters ?> литров</h3>
        </div>
        <div>
            <h3><?php echo '~' . $sum / $liters ?> р/л</h3>
        </div>
    </div>
</div>