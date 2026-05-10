function hcLokmaPPHesapla() {
    const count = parseInt(document.getElementById('hc-lokma-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // 10 kişilik baz tarif: 500g un, 2.5 su bardağı su, 1 paket maya
    const factor = count / 10;

    const flour = factor * 500;
    const water = factor * 2.5; // bardak
    const yeast = Math.ceil(factor * 1);

    document.getElementById('hc-lokma-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Un:</strong> ${flour.toLocaleString('tr-TR')} g</li>
            <li><strong>Su:</strong> ${water.toLocaleString('tr-TR', {maximumFractionDigits:1})} su bardağı</li>
            <li><strong>Maya:</strong> ${yeast} paket (kuru maya)</li>
            <li><strong>Şerbet:</strong> ${factor * 3} bardak şeker + ${factor * 3} bardak su</li>
        </ul>
    `;
    
    document.getElementById('hc-lokma-info').innerText = `Bu ölçülerle yaklaşık ${count * 5} - ${count * 7} adet lokma tanesi (kişi başı birer küçük kase) elde edilir.`;
    document.getElementById('hc-lokma-pp-result').classList.add('visible');
}
