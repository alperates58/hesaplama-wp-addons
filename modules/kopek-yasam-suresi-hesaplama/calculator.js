function hcKopekYasamHesapla() {
    const baseLife = parseInt(document.getElementById('hc-kys-size').value);
    
    // Basit bir istatistiksel tahmin
    const resVal = document.getElementById('hc-kys-res-val');
    resVal.innerText = baseLife + " - " + (baseLife + 2);

    document.getElementById('hc-kopek-yasam-result').classList.add('visible');
}
