function hcObpHesapla() {
    const diploma = parseFloat(document.getElementById('hc-obp-diploma').value);

    if (isNaN(diploma) || diploma < 0 || diploma > 100) {
        alert('Lütfen 0-100 arası geçerli bir diploma notu girin.');
        return;
    }

    const obp = diploma * 5;
    const impact = obp * 0.12;

    document.getElementById('hc-obp-val').innerText = obp.toFixed(2);
    document.getElementById('hc-obp-impact').innerText = "+" + impact.toFixed(2) + " Puan";
    document.getElementById('hc-obp-result').classList.add('visible');
}
