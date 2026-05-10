function hcSetArasiDinlenmeSuresiHesapla() {
    const goal = document.getElementById('hc-rest-goal').value;
    let time = "";
    let why = "";

    switch(goal) {
        case 'strength':
            time = "3 - 5 Dakika";
            why = "Maksimum kuvvet için ATP-PC depolarının tam dolması ve sinir sisteminin toparlanması gerekir.";
            break;
        case 'hypertrophy':
            time = "60 - 90 Saniye";
            why = "Kas gelişimi için metabolik stres ve mekanik yüklenme dengesi bu süre zarfında en idealdir.";
            break;
        case 'endurance':
            time = "30 - 45 Saniye";
            why = "Kardiyovasküler kapasiteyi artırmak ve laktik asit toleransını yükseltmek için kısa dinlenmeler tercih edilir.";
            break;
    }

    document.getElementById('hc-rest-val').innerText = time;
    document.getElementById('hc-rest-why').innerText = why;
    document.getElementById('hc-rest-result').classList.add('visible');
}
