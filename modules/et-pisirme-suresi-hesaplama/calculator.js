function hcSteakTimeHesapla() {
    const thick = parseFloat(document.getElementById('hc-st-thick').value) || 2.5;
    const level = document.getElementById('hc-st-level').value;

    let baseMins = 2; // 2.5cm rare base
    switch(level) {
        case 'rare': baseMins = 2; break;
        case 'med_rare': baseMins = 3; break;
        case 'medium': baseMins = 4; break;
        case 'well': baseMins = 6; break;
    }

    // Adjustment for thickness (every 1cm adds 1min per side)
    const totalMinsPerSide = baseMins + (thick - 2.5);

    const m = Math.floor(totalMinsPerSide);
    const s = Math.round((totalMinsPerSide - m) * 60);

    document.getElementById('hc-res-st-side').innerText = m + " dk " + (s > 0 ? s + " sn" : "");
    document.getElementById('hc-steak-time-result').classList.add('visible');
}
