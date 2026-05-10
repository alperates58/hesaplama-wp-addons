function hcPancakePPHesapla() {
    const count = parseInt(document.getElementById('hc-pancake-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // 2 kişilik baz tarif: 1 yumurta, 1 sb un (125g), 1 sb süt (200ml), 2 yk şeker
    const factor = count / 2;

    const eggs = Math.max(1, Math.round(factor));
    const flour = factor * 125;
    const milk = factor * 200;
    const sugar = factor * 2;

    document.getElementById('hc-pancake-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Yumurta:</strong> ${eggs} adet</li>
            <li><strong>Un:</strong> ${flour.toLocaleString('tr-TR')} g</li>
            <li><strong>Süt:</strong> ${milk.toLocaleString('tr-TR')} ml</li>
            <li><strong>Şeker:</strong> ${sugar.toLocaleString('tr-TR')} yemek kaşığı</li>
            <li><strong>Kabartma Tozu/Vanilya:</strong> ${Math.ceil(factor * 0.5)} paket</li>
        </ul>
    `;
    
    document.getElementById('hc-pancake-info').innerText = `Bu ölçülerle yaklaşık ${Math.round(count * 4)} - ${Math.round(count * 5)} adet orta boy pankek elde edersiniz.`;
    document.getElementById('hc-pancake-pp-result').classList.add('visible');
}
