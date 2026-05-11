function hcThrustWeightHesapla() {
    const thrust = parseFloat(document.getElementById('hc-tw-thrust').value);
    const mass = parseFloat(document.getElementById('hc-tw-mass').value);

    if (isNaN(thrust) || isNaN(mass) || mass <= 0) {
        alert('Lütfen geçerli itki ve kütle değerleri girin.');
        return;
    }

    const g = 9.80665;
    const weight = mass * g;
    const ratio = thrust / weight;

    document.getElementById('hc-tw-res-val').innerText = ratio.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    let desc = "";
    if (ratio > 1) desc = "Dikey kalkış yapabilir (T/W > 1).";
    else if (ratio === 1) desc = "Havada asılı kalabilir (T/W = 1).";
    else desc = "Dikey kalkış için yetersiz itki (T/W < 1).";

    document.getElementById('hc-tw-res-desc').innerText = desc;
    
    document.getElementById('hc-tw-result').classList.add('visible');
}
