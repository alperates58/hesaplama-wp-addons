function hcVfHesapla() {
    const vize = parseFloat(document.getElementById('hc-vf-vize').value);
    const vizeW = parseFloat(document.getElementById('hc-vf-vize-w').value);
    const target = parseFloat(document.getElementById('hc-vf-target').value);

    if (isNaN(vize) || isNaN(vizeW) || isNaN(target)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const finalW = 100 - vizeW;
    document.getElementById('hc-vf-final-w-display').innerText = finalW;

    const vizeContribution = vize * (vizeW / 100);
    const neededFromFinal = target - vizeContribution;
    const neededFinalScore = (neededFromFinal / (finalW / 100)).toFixed(2);

    const display = document.getElementById('hc-vf-needed');
    if (neededFinalScore <= 0) {
        display.innerText = "0 (Zaten Geçtiniz)";
        display.style.color = "green";
    } else if (neededFinalScore > 100) {
        display.innerText = neededFinalScore + " (İmkansız)";
        display.style.color = "red";
    } else {
        display.innerText = neededFinalScore;
        display.style.color = "inherit";
    }

    document.getElementById('hc-vf-result').classList.add('visible');
}
