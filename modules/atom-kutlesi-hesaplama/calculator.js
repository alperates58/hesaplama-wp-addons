function hcAKAddIsotope() {
    const container = document.getElementById('hc-ak-isotopes');
    const div = document.createElement('div');
    div.className = 'hc-ak-row';
    div.style.display = 'flex';
    div.style.gap = '10px';
    div.style.marginBottom = '10px';
    div.innerHTML = `<input type="number" class="hc-ak-mass" placeholder="Kütle (amu)" step="any">
                     <input type="number" class="hc-ak-perc" placeholder="Bolluk (%)" step="any">`;
    container.appendChild(div);
}

function hcAKHesapla() {
    const masses = document.getElementsByClassName('hc-ak-mass');
    const percs = document.getElementsByClassName('hc-ak-perc');
    
    let totalMass = 0;
    let totalPerc = 0;
    let hasValue = false;

    for (let i = 0; i < masses.length; i++) {
        const m = parseFloat(masses[i].value);
        const p = parseFloat(percs[i].value);
        
        if (!isNaN(m) && !isNaN(p)) {
            totalMass += (m * p);
            totalPerc += p;
            hasValue = true;
        }
    }

    if (!hasValue) {
        alert('Lütfen en az bir izotop verisi giriniz.');
        return;
    }

    if (Math.abs(totalPerc - 100) > 0.1) {
        alert('Uyarı: Bolluk yüzdeleri toplamı %' + totalPerc.toLocaleString('tr-TR') + '. Genellikle %100 olmalıdır.');
    }

    const average = totalMass / totalPerc; // Genellikle /100 olur ama toplam 100 değilse orantıladık.

    document.getElementById('hc-ak-val').innerText = average.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' amu';
    document.getElementById('hc-ak-result').classList.add('visible');
}
