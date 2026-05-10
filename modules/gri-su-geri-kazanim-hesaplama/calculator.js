function hcGriSuGeriKazanımHesapla() {
    const persons = parseFloat(document.getElementById('hc-gw-persons').value);
    const checks = document.querySelectorAll('.hc-gw-source:checked');

    if (!persons || checks.length === 0) return;

    let dailyPerPerson = 0;
    checks.forEach(c => dailyPerPerson += parseFloat(c.value));

    const dailyTotal = dailyPerPerson * persons;
    const yearlyTotal = dailyTotal * 365;

    document.getElementById('hc-gw-val').innerText = Math.round(yearlyTotal).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-gw-info').innerText = `Bu miktar yaklaşık ${Math.round(yearlyTotal / 1000)} m³ suya eşittir.`;
    document.getElementById('hc-gw-result').classList.add('visible');
}
