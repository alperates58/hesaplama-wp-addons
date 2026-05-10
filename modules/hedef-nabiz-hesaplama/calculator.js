function hcHrTargetHesapla() {
    const age = parseInt(document.getElementById('hc-ht-age').value);
    const restHr = parseInt(document.getElementById('hc-ht-rest').value);
    const intensity = parseInt(document.getElementById('hc-ht-intensity').value) / 100;

    if (!age || !restHr || !intensity) {
        alert('Lütfen tüm bilgileri giriniz.');
        return;
    }

    // Karvonen Formula
    const maxHr = 220 - age;
    const hrr = maxHr - restHr;
    const targetHr = (hrr * intensity) + restHr;

    const resVal = document.getElementById('hc-ht-res-val');
    resVal.innerText = Math.round(targetHr);

    document.getElementById('hc-hr-target-result').classList.add('visible');
}
