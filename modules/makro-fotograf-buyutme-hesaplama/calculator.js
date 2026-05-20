function hcMakroFotografBuyutmeHesapla() {
    var focal = parseFloat(document.getElementById('hc-macro-focal').value);
    var extension = parseFloat(document.getElementById('hc-macro-extension').value);
    var aperture = parseFloat(document.getElementById('hc-macro-aperture').value);
    var sensor = parseFloat(document.getElementById('hc-macro-sensor').value);

    if (isNaN(focal) || isNaN(aperture) || focal <= 0 || aperture <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    extension = isNaN(extension) ? 0 : extension;

    // Magnification = (Extension Tube Length / Focal Length)
    var baseMagnification = extension > 0 ? extension / focal : 0;
    var totalMagnification = baseMagnification + (1 / focal) * 100; // Simplified for macro
    totalMagnification = Math.max(0.1, baseMagnification * 0.5); // Practical approximation

    // Effective f-stop = marked f-number × (1 + magnification)
    var effectiveF = aperture * (1 + totalMagnification);

    // Light loss in stops = log2(effectiveF / aperture)
    var lightLossStops = Math.log2(effectiveF / aperture);

    // Frame size at 1:1 on full frame (36mm width)
    var frameSizeFullFrame = 36; // mm
    var frameSizeSubject = frameSizeFullFrame / Math.max(0.1, totalMagnification);

    var magStr = totalMagnification.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ':1';
    var effectiveFStr = 'f/' + effectiveF.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    var lightLossStr = lightLossStops.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' stops';
    var frameSizeStr = frameSizeSubject.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' mm';

    document.getElementById('hc-macro-magnification-val').innerText = magStr;
    document.getElementById('hc-macro-effective-f-val').innerText = effectiveFStr;
    document.getElementById('hc-macro-light-loss-val').innerText = lightLossStr;
    document.getElementById('hc-macro-frame-size-val').innerText = frameSizeStr;

    document.getElementById('hc-makro-fotograf-buyutme-hesaplama-result').classList.add('visible');
}
