function hcCaffEffectHesapla() {
    const amount = parseFloat(document.getElementById('hc-effect-amount').value);
    const hours = parseFloat(document.getElementById('hc-effect-time').value);

    if (isNaN(amount) || isNaN(hours)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    // Kafeinin yarı ömrü ortalama 5 saattir.
    // Mevcut = Başlangıç * (0.5 ^ (saat / 5))
    const current = amount * Math.pow(0.5, hours / 5);

    document.getElementById('hc-effect-val').innerText = Math.round(current) + ' mg';
    
    let info = '';
    if (hours < 0.75) {
        info = 'Kafein henüz tam olarak kana karışmadı. Etkisi 30-45 dk içinde pik yapacaktır.';
    } else if (current > 50) {
        info = 'Vücudunuzda hala belirgin miktarda kafein var. Uyku kalitenizi etkileyebilir.';
    } else {
        info = 'Kafein etkisi azalmaya başladı.';
    }

    document.getElementById('hc-effect-info').innerText = info;
    document.getElementById('hc-caff-effect-result').classList.add('visible');
}
