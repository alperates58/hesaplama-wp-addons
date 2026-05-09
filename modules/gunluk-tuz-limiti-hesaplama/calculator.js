function hcTuzLimitiHesapla() {
    const grams = parseFloat(document.getElementById('hc-sl-grams').value);

    if (isNaN(grams)) {
        alert('Lütfen tuz miktarını girin.');
        return;
    }

    const status = document.getElementById('hc-sl-status');
    const info = document.getElementById('hc-sl-info');

    if (grams <= 5) {
        status.innerText = 'GÜVENLİ: Tuz tüketiminiz önerilen limitler dahilinde.';
        status.style.backgroundColor = '#e8f5e9';
        status.style.color = '#2e7d32';
        info.innerText = 'Sağlıklı bir tansiyon ve kalp sağlığı için bu seviyeyi koruyun.';
    } else if (grams <= 10) {
        status.innerText = 'UYARI: Limitleri aşıyorsunuz.';
        status.style.backgroundColor = '#fff3e0';
        status.style.color = '#ef6c00';
        info.innerText = 'Tuz tüketiminizi azaltmaya başlamanız önerilir. Gizli tuz içeren paketli gıdalara dikkat edin.';
    } else {
        status.innerText = 'RİSKLİ: Çok yüksek tuz tüketimi!';
        status.style.backgroundColor = '#ffebee';
        status.style.color = '#c62828';
        info.innerText = 'Yüksek tansiyon ve böbrek sağlığı için ciddi risk taşıyorsunuz. Acilen tuzu azaltmalısınız.';
    }

    document.getElementById('hc-salt-limit-result').classList.add('visible');
}
