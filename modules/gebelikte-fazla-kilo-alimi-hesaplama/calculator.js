function hcPregExcessHesapla() {
    const week = parseInt(document.getElementById('hc-pe-week').value);
    const gain = parseFloat(document.getElementById('hc-pe-gain').value);
    const vki = document.getElementById('hc-pe-vki').value;

    if (!week || isNaN(gain)) return;

    let maxGain = 2; // Initial gain for 1st trimester
    if (week > 12) {
        const remainingWeeks = week - 12;
        let weeklyRate = 0.4; // Average for normal BMI
        if (vki === 'low') weeklyRate = 0.5;
        if (vki === 'high') weeklyRate = 0.3;
        maxGain += (remainingWeeks * weeklyRate);
    }

    const resDesc = document.getElementById('hc-pe-res-desc');
    const resInfo = document.getElementById('hc-pe-res-info');

    if (gain > maxGain + 2) {
        resDesc.innerText = 'Kilo Alımı Fazla';
        resDesc.style.color = '#e74c3c';
        resInfo.innerText = `${week}. hafta için önerilen üst sınır yaklaşık ${maxGain.toFixed(1)} kg'dır. Beslenmenizi bir doktorla gözden geçirmeniz önerilir.`;
    } else if (gain < maxGain - 3 && week > 15) {
        resDesc.innerText = 'Kilo Alımı Düşük';
        resDesc.style.color = '#f1c40f';
        resInfo.innerText = 'Gelişim takibi için doktorunuza danışınız.';
    } else {
        resDesc.innerText = 'Kilo Alımı Normal';
        resDesc.style.color = '#27ae60';
        resInfo.innerText = 'Şu anki kilonuz gebelik haftanıza göre sağlıklı sınırlar içerisinde.';
    }

    document.getElementById('hc-preg-excess-result').classList.add('visible');
}
