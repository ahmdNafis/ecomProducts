import './bootstrap';
import '../css/app.css';

import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ApiProvider } from '@reduxjs/toolkit/dist/query/react';
import { apiSlice } from './Pages/features/api/apiSlice';
import { QueryClient, QueryClientProvider } from 'react-query';

const appName = import.meta.env.VITE_APP_NAME || 'Ecommerce';

const client = new QueryClient()

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <QueryClientProvider client={client} >
                <ApiProvider api={apiSlice}>
                    <App {...props} />
                </ApiProvider>
            </QueryClientProvider>
        );
    },
    progress: {
        color: '#4B5563',
    },
});
