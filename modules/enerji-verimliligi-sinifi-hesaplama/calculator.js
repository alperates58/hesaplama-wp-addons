function hcEnerjiSinifiHesapla() {
    const actual = parseFloat(document.getElementById('hc-ee-actual').value);
    const ref = parseFloat(document.getElementById('hc-ee-ref').value);

    if (isNaN(actual) || isNaN(ref)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const eei = (actual / ref) * 100;
    let energyClass = 'G';

    if (eei < 22) energyClass = 'A+++';
    else if (eei < 33) energyClass = 'A++';
    else if (eei < 44) energyClass = 'A+';
    else if (eei < 55) energyClass = 'A';
    else if (eei < 75) energyClass = 'B';
    else if (eei < 95) energyClass = 'C';
    else if (eei < 110) energyClass = 'D';
    else if (eei < 125) energyClass = 'E';
    else if (eei < 150) energyClass = 'F';

    document.getElementById('hc-res-ee-index').innerText = eei.toFixed(1);
    document.getElementById('hc-res-ee-class').innerText = energyClass;

    // Add color class
    const classElem = document.getElementById('hc-res-ee-class');
    classElem.className = 'hc-result-value highlight';
    if (energyClass.startsWith('A')) classElem.style.color = '#27ae60';
    else if (energyClass === 'B' || energyClass === 'C') classElem.style.color = '#f1c40f';
    else classElem.style.color = '#e74c3c';

    document.getElementById('hc-ee-result').classList.add('visible');
}
