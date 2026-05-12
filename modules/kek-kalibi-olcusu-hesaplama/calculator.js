function hcKekBoyutOner() {
    const eggs = parseInt(document.getElementById('hc-ps-eggs').value);
    const flour = parseFloat(document.getElementById('hc-ps-flour').value);

    if (!eggs || !flour) {
        alert('Lütfen malzeme miktarlarını giriniz.');
        return;
    }

    let size = "20-22 cm";
    if (eggs <= 2 || flour <= 150) {
        size = "18-20 cm";
    } else if (eggs <= 4 || flour <= 350) {
        size = "22-24 cm";
    } else if (eggs <= 6 || flour <= 500) {
        size = "26-28 cm";
    } else {
        size = "30+ cm veya Dikdörtgen Borcam";
    }

    const resultDiv = document.getElementById('hc-pan-size-result');
    document.getElementById('hc-ps-res-val').innerText = size;
    
    document.getElementById('hc-ps-res-note').innerText = `Kekin ideal kabarması için kalıbın en az yarısının, en fazla 2/3'ünün dolması önerilir.`;
    
    resultDiv.classList.add('visible');
}
