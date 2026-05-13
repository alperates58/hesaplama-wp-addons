function hcModBul() {
    const dataText = document.getElementById('hc-mod-data').value.trim();
    const resultDiv = document.getElementById('hc-mod-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
    if (nums.length === 0) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const counts = {};
    let maxCount = 0;
    nums.forEach(n => {
        counts[n] = (counts[n] || 0) + 1;
        if (counts[n] > maxCount) maxCount = counts[n];
    });

    const modes = [];
    for (let key in counts) {
        if (counts[key] === maxCount) modes.push(key);
    }

    let modeDisplay = "";
    let freqDisplay = "";

    if (maxCount === 1 && nums.length > 1) {
        modeDisplay = "Yok";
        freqDisplay = "Tüm değerler sadece 1 kez tekrar ediyor.";
    } else {
        modeDisplay = modes.join(', ');
        freqDisplay = `Frekans: ${maxCount} kez tekrar ediyor.`;
    }

    document.getElementById('hc-mod-res-val').innerText = modeDisplay;
    document.getElementById('hc-mod-res-freq').innerText = freqDisplay;

    resultDiv.classList.add('visible');
}
