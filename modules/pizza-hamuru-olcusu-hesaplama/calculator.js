function hcPizzaHamurHesapla() {
    const d = parseFloat(document.getElementById('hc-pds-diameter').value);
    const thick = parseFloat(document.getElementById('hc-pds-thick').value);

    if (!d || d <= 0) {
        alert('Lütfen pizza çapını giriniz.');
        return;
    }

    const area = Math.PI * Math.pow(d / 2, 2);
    const weight = area * thick;

    const resultDiv = document.getElementById('hc-pizza-dough-size-result');
    document.getElementById('hc-pds-res-val').innerText = Math.round(weight) + ' g';
    
    resultDiv.classList.add('visible');
}
