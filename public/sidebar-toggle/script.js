
/* sidebar */
const sideBarDisappearBtn = document.getElementById('side-bar-disappear-btn');
sideBarDisappearBtn.classList.add(`top-[${((innerHeight - 50)/2  - 50)}px]`)
const sideBarAppearBtn = document.getElementById('side-bar-appear-btn');
const sideBarAppearCnt = document.getElementById('side-bar-appear-cnt');
sideBarAppearCnt.classList.add(`h-[${innerHeight - 50}px]`)

const initialState = localStorage.getItem('appear');

if (initialState === 'true') {
    sideBarDisappearBtn.classList.add('hidden');
    sideBarAppearCnt.classList.remove('hidden');
} else {
    sideBarDisappearBtn.classList.remove('hidden');
    sideBarAppearCnt.classList.add('hidden');
}

sideBarDisappearBtn.addEventListener('click', function() {
    localStorage.setItem('appear', 'true');
    toggleSideBar();
});

sideBarAppearBtn.addEventListener('click', function() {
    localStorage.setItem('appear', 'false');
    toggleSideBar();
});

function toggleSideBar() {
    const sharedYield = document.getElementById('shared-yield');
    const isSidebarAppearing = localStorage.getItem('appear') === 'true';

    if (isSidebarAppearing) {
        sideBarDisappearBtn.classList.add('hidden');
        sideBarAppearCnt.classList.remove('hidden');
        sharedYield.classList.add(`ml-[280px]`);
    } else {
        sideBarDisappearBtn.classList.remove('hidden');
        sideBarAppearCnt.classList.add('hidden');
        sharedYield.classList.remove(`ml-[280px]`);
    }
}


//
const sharedYield = document.getElementById('shared-yield');

if(localStorage.getItem('appear') === 'true') {
    sharedYield.classList.add(`ml-[280px]`);
}else {
    sharedYield.classList.remove(`ml-[280px]`);
}
