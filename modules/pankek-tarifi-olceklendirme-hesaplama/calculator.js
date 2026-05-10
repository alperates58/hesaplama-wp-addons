function hcPancakeScalingHesapla() {
    const eggs = parseInt(document.getElementById('hc-ps-eggs').value);

    if (isNaN(eggs) || eggs <= 0) {
        alert('Lütfen yumurta sayısını giriniz.');
        return;
    }

    // Baz tarif (1 yumurta için): 125g un, 200ml süt, 2yk şeker
    const factor = eggs;

    const flour = factor * 125;
    const milk = factor * 200;
    const sugar = factor * 2;

    document.getElementById('hc-ps-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Un:</strong> ${flour.toLocaleString('tr-TR')} g</li>
            <li><strong>Süt:</strong> ${milk.toLocaleString('tr-TR')} ml</li>
            <li><strong>Şeker:</strong> ${sugar} yemek kaşığı</li>
            <li><strong>Kabartma Tozu/Vanilya:</strong> ${Math.ceil(factor * 0.5)} paket</li>
        </ul>
    `;
    
    document.getElementById('hc-ps-info').innerText = `Bu ölçülerle yaklaşık ${eggs * 8} - ${eggs * 10} adet orta boy pankek elde edersiniz.`;
    document.getElementById('hc-pancake-scaling-result').classList.add('visible');
}
