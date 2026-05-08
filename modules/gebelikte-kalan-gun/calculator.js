function hcKalanGunHesapla() {
    const eddVal = document.getElementById('hc-dg-edd').value;

    if (!eddVal) {
        alert('Lütfen TDT seçin.');
        return;
    }

    const edd = new Date(eddVal);
    const today = new Date();
    today.setHours(0,0,0,0);

    const diffTime = edd - today;
    const diffDays = Math.ceil(diffTime / (24 * 60 * 60 * 1000));

    if (diffDays < 0) {
        document.getElementById('hc-dg-value').innerText = "0 Gün";
        document.getElementById('hc-dg-details').innerText = "Doğum tarihi geçmiş görünüyor!";
    } else {
        document.getElementById('hc-dg-value').innerText = diffDays + " Gün";
        const w = Math.floor(diffDays / 7);
        const d = diffDays % 7;
        const m = (diffDays / 30.44).toFixed(1);
        document.getElementById('hc-dg-details').innerHTML = `
            <b>Yaklaşık:</b> ${w} hafta ${d} gün<br>
            <b>Veya:</b> ${m.toLocaleString('tr-TR')} ay
        `;
    }

    document.getElementById('hc-days-left-result').classList.add('visible');
}
