function hcEvselAtıkMiktarıHesapla() {
    const persons = parseFloat(document.getElementById('hc-wa-persons').value);
    const factor = parseFloat(document.getElementById('hc-wa-lifestyle').value);

    if (!persons) return;

    // Türkiye ortalaması kişi başı günlük yaklaşık 1.1 kg atık.
    const dailyPerPerson = 1.1 * factor;
    const dailyTotal = dailyPerPerson * persons;
    const monthlyTotal = dailyTotal * 30;
    const yearlyTotal = dailyTotal * 365;

    document.getElementById('hc-wa-val').innerText = Math.round(yearlyTotal).toLocaleString('tr-TR') + ' kg';
    document.getElementById('hc-wa-details').innerHTML = `
        Günlük: ${dailyTotal.toFixed(1)} kg<br>
        Aylık: ${Math.round(monthlyTotal)} kg
    `;
    document.getElementById('hc-wa-result').classList.add('visible');
}
