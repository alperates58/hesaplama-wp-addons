function hcAcCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-ac-area').value);
    const regionFactor = parseFloat(document.getElementById('hc-ac-region').value);
    const people = parseFloat(document.getElementById('hc-ac-people').value);

    if (!area) {
        alert('Lütfen alanı giriniz.');
        return;
    }

    // Formula: (Area * RegionFactor) + (People * 500)
    let btu = (area * regionFactor) + (people * 500);

    const resVal = document.getElementById('hc-ac-res-val');
    resVal.innerText = Math.round(btu).toLocaleString('tr-TR');

    const rec = document.getElementById('hc-ac-res-rec');
    if (btu <= 9500) rec.innerText = "Önerilen: 9.000 BTU";
    else if (btu <= 12500) rec.innerText = "Önerilen: 12.000 BTU";
    else if (btu <= 18500) rec.innerText = "Önerilen: 18.000 BTU";
    else if (btu <= 24500) rec.innerText = "Önerilen: 24.000 BTU";
    else rec.innerText = "Salon Tipi / Çoklu Ünite Gerekli";

    document.getElementById('hc-ac-result').classList.add('visible');
}
