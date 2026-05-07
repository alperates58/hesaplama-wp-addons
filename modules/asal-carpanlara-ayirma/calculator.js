function hcAsalCarpanla() {
    let n = parseInt(document.getElementById('hc-prime-input').value);

    if (isNaN(n) || n < 2) {
        alert('Lütfen 2 veya daha büyük bir tamsayı giriniz.');
        return;
    }

    let factors = {};
    let temp = n;
    let d = 2;

    while (temp > 1) {
        while (temp % d === 0) {
            factors[d] = (factors[d] || 0) + 1;
            temp /= d;
        }
        d++;
        if (d * d > temp) {
            if (temp > 1) {
                factors[temp] = (factors[temp] || 0) + 1;
                break;
            }
        }
    }

    // Listeyi hazırla
    let flatList = [];
    let expoList = [];
    
    const sortedFactors = Object.keys(factors).sort((a, b) => a - b);
    
    sortedFactors.forEach(f => {
        const count = factors[f];
        for(let i=0; i<count; i++) flatList.push(f);
        
        if (count > 1) {
            expoList.push(`${f}<sup>${count}</sup>`);
        } else {
            expoList.push(`${f}`);
        }
    });

    document.getElementById('hc-res-list-flat').innerText = flatList.join(' × ');
    document.getElementById('hc-res-expo-val').innerHTML = expoList.join(' × ');

    document.getElementById('hc-prime-result').classList.add('visible');
    document.getElementById('hc-prime-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
