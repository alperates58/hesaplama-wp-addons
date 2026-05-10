function hcGrillSizeHesapla() {
    const count = parseInt(document.getElementById('hc-grill-count').value);
    const areaPerPerson = parseFloat(document.getElementById('hc-grill-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Kişi başı cm2 cinsinden alan
    const totalArea = count * areaPerPerson;
    // Standart dikdörtgen ızgara için boyut tahmini (Altın oran ~1.5)
    const width = Math.sqrt(totalArea / 1.5);
    const length = width * 1.5;

    document.getElementById('hc-grill-val').innerText = totalArea.toLocaleString('tr-TR') + ' cm²';
    document.getElementById('hc-grill-info').innerText = `İdeal mangal boyutu yaklaşık: ${Math.round(length)} x ${Math.round(width)} cm olmalıdır.`;
    
    document.getElementById('hc-grill-size-result').classList.add('visible');
}
