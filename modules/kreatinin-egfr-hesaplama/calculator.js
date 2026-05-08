function hcEGFRHesapla() {
    const sex = document.getElementById('hc-egfr-sex').value;
    const age = parseFloat(document.getElementById('hc-egfr-age').value);
    const scr = parseFloat(document.getElementById('hc-egfr-scr').value);

    if (isNaN(age) || isNaN(scr) || age < 18) {
        alert('Lütfen geçerli bir yaş (18+) ve kreatinin değeri girin.');
        return;
    }

    // CKD-EPI 2021 race-free
    // GFR = 142 * min(Scr/k, 1)^a * max(Scr/k, 1)^-1.200 * 0.9938^Age * [1.012 if female]
    const k = (sex === 'female') ? 0.7 : 0.9;
    const a = (sex === 'female') ? -0.241 : -0.302;
    const femaleFactor = (sex === 'female') ? 1.012 : 1.0;

    const gfr = 142 * Math.pow(Math.min(scr / k, 1), a) * 
                Math.pow(Math.max(scr / k, 1), -1.200) * 
                Math.pow(0.9938, age) * femaleFactor;

    document.getElementById('hc-egfr-value').innerText = Math.round(gfr) + ' mL/dk';

    const stageBox = document.getElementById('hc-egfr-stage');
    if (gfr >= 90) {
        stageBox.innerText = 'Evre 1: Normal veya yüksek böbrek fonksiyonu.';
        stageBox.style.backgroundColor = '#e8f5e9'; stageBox.style.color = '#2e7d32';
    } else if (gfr >= 60) {
        stageBox.innerText = 'Evre 2: Böbrek fonksiyonunda hafif azalma.';
        stageBox.style.backgroundColor = '#fffde7'; stageBox.style.color = '#fbc02d';
    } else if (gfr >= 30) {
        stageBox.innerText = 'Evre 3: Orta derecede böbrek fonksiyonu kaybı.';
        stageBox.style.backgroundColor = '#fff3e0'; stageBox.style.color = '#ef6c00';
    } else if (gfr >= 15) {
        stageBox.innerText = 'Evre 4: Şiddetli böbrek fonksiyonu kaybı.';
        stageBox.style.backgroundColor = '#ffebee'; stageBox.style.color = '#c62828';
    } else {
        stageBox.innerText = 'Evre 5: Böbrek yetmezliği.';
        stageBox.style.backgroundColor = '#fce4ec'; stageBox.style.color = '#880e4f';
    }

    document.getElementById('hc-egfr-result').classList.add('visible');
}
