import { TestBed } from '@angular/core/testing';

import { RefreshTokenInterceptorService } from './refresh-token-interceptor.service';

describe('RefreshTokenInterceptorService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: RefreshTokenInterceptorService = TestBed.get(RefreshTokenInterceptorService);
    expect(service).toBeTruthy();
  });
});
