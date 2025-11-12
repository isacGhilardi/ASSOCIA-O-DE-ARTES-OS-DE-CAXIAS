// JAVASCRIPT ORIGINAL DOS ALUNOS COM ADAPTAÇÕES
document.addEventListener('DOMContentLoaded', () => {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navMenu = document.getElementById('navbarNav');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-item a');
    const navbarNav = document.querySelector('.navbar-nav');

    const activeLine = document.createElement('span');
    activeLine.classList.add('active-line');
    if (navbarNav) {
        navbarNav.appendChild(activeLine);
    }

    function positionActiveLine() {
        if (!navbarNav) {
            return;
        }

        const activeItem = navbarNav.querySelector('.nav-item.active');
        if (activeItem && window.innerWidth >= 900) {
            const activeLink = activeItem.querySelector('a');
            if (activeLink) {
                activeLine.style.width = activeLink.offsetWidth + 'px';
                activeLine.style.left = activeLink.offsetLeft + 'px';
                activeLine.style.opacity = '1';
            }
        } else {
            activeLine.style.opacity = '0'; 
        }
    }

    if (navbarToggler && navMenu) {
        const toggleMenu = () => {
            const isExpanded = navMenu.classList.toggle('active');
            navbarToggler.setAttribute('aria-expanded', isExpanded);
            navbarToggler.innerHTML = isExpanded ? '×' : '☰';
        };

        navbarToggler.addEventListener('click', toggleMenu);

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 900 && navMenu.classList.contains('active')) {
                    toggleMenu(); 
                }
            });
        });
    }

    const sections = Array.from(document.querySelectorAll('section[id]'));

    function clearActive() {
        navLinks.forEach(link => link.closest('.nav-item')?.classList.remove('active'));
    }

    function markActiveBySectionId(id) {
        clearActive();
        navLinks.forEach(link => {
            const hrefId = link.getAttribute('href') ? link.getAttribute('href').replace('#','') : '';
            if (hrefId === id) {
                link.closest('.nav-item').classList.add('active');
            }
        });
        positionActiveLine();
    }

    function getCurrentSectionByViewport() {
        const refY = window.innerHeight * 0.45;
        let best = null;
        let bestDist = Infinity;

        sections.forEach(sec => {
            const rect = sec.getBoundingClientRect();
            if (rect.top <= refY && rect.bottom >= refY) {
                best = sec;
                bestDist = 0;
                return;
            }
            const secCenter = rect.top + rect.height / 2;
            const dist = Math.abs(secCenter - refY);
            if (dist < bestDist) {
                bestDist = dist;
                best = sec;
            }
        });
        return best ? best.id : null;
    }

    let ticking = false;
    function onScrollOrResize() {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
            const id = getCurrentSectionByViewport();
            if (id) markActiveBySectionId(id);
            ticking = false;
        });
    }

    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize);
    onScrollOrResize();

    const homeLink = document.querySelector('.navbar-nav .nav-item a[href="#home-section"]');
    if (homeLink) {
        homeLink.closest('.nav-item').classList.add('active');
        positionActiveLine();
    }

    window.addEventListener('resize', () => {
        positionActiveLine();
        if (window.innerWidth >= 900 && navMenu && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            navbarToggler.setAttribute('aria-expanded', false);
            navbarToggler.innerHTML = '☰';
        }
    });

    // Galeria de artesanatos com imagens do projeto dos alunos
    const galleryItems = [
        { 
            src: '/imagens/artesanato_alunos/artesanato1.jpg', 
            alt: 'Cesta de palha artesanal', 
            title: 'Cesta de Palha', 
            description: 'Cesta tecida à mão com fibras naturais, ideal para decoração ou uso diário.' 
        },
        { 
            src: '/imagens/artesanato_alunos/artesanato2.jpg', 
            alt: 'Escultura de madeira rústica', 
            title: 'Escultura em Madeira', 
            description: 'Obra de arte entalhada em madeira rústica, representando a fauna local.' 
        },
        { 
            src: '/imagens/artesanato_alunos/artesanato3.jpg', 
            alt: 'Cerâmica pintada à mão', 
            title: 'Vaso de Cerâmica', 
            description: 'Vaso de cerâmica com pintura manual, um toque de arte para seu lar.' 
        },
        { 
            src: '/imagens/artesanato_alunos/artesanato4.jpg', 
            alt: 'Bolsa de tecido bordada', 
            title: 'Bolsa Artesanal', 
            description: 'Bolsa exclusiva com bordados feitos à mão, unindo tradição e estilo.' 
        }
    ];

    const galleryContainer = document.getElementById('artesanatos-gallery');
    const modal = document.getElementById('galleryModal');
    const modalImg = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const closeModal = document.querySelector('.close-button');

    if (galleryContainer) {
        galleryItems.forEach((item) => {
            const galleryItemDiv = document.createElement('div');
            galleryItemDiv.classList.add('gallery-item');
            galleryItemDiv.innerHTML = `<img src="${item.src}" alt="${item.alt}"><h3>${item.title}</h3>`;
            
            galleryItemDiv.addEventListener('click', () => {
                modal.style.display = 'block';
                modalImg.src = item.src;
                modalTitle.textContent = item.title;
                modalDescription.textContent = item.description;
            });
            galleryContainer.appendChild(galleryItemDiv);
        });
    }

    if (closeModal) {
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});