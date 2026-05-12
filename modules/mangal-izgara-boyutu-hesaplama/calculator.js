function hcGrillBoyutHesapla() {
    const count = parseInt(document.getElementById('hc-gs-count').value);
    const areaPerPerson = parseFloat(document.getElementById('hc-gs-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalArea = count * areaPerPerson;
    
    // Suggest dimensions based on aspect ratio ~1.5:1
    const width = Math.sqrt(totalArea * 1.5);
    const height = totalArea / width;

    const resultDiv = document.getElementById('hc-grill-size-result');
    document.getElementById('hc-gs-res-area').innerText = totalArea + ' cm²';
    document.getElementById('hc-gs-res-dim').innerText = Math.round(width) + ' x ' + Math.round(height) + ' cm';
    
    resultDiv.classList.add('visible');
}
